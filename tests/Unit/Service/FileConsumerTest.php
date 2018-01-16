<?php

namespace App\Tests\Unit\Service;

use App\Service\FileConsumer as SUT;
use PHPUnit\Framework\TestCase;
use org\bovigo\vfs\vfsStream,
    org\bovigo\vfs\vfsStreamDirectory;

class FileConsumerTest extends TestCase
{
    /**
     * FileConsumer
     *
     * @var FileConsumer
     */
    public $fileConsumer;

    /**
     * @var  vfsStreamDirectory
     */
    private $root;

    public function setUp()
    {
        $this->root = vfsStream::setup('testDir');
    }

    private function initializeSUT()
    {
        $this->fileConsumer = new SUT();
    }

    /**
     * getFileContent method must return a string when the file exists
     *
     * @test
     */
    public function getFileContentReturnsString()
    {
        $this->initializeSUT();

        $fileResource = vfsStream::newFile('test.txt')
            ->at($this->root)
        ;

        $actual = $this->fileConsumer->getFileContent($fileResource->url());

        $this->assertInternalType('string', $actual);
    }

    /**
     * getFileContent method returns an empty array, when resource is not found
     *
     * @test
     * @expectedException PHPUnit\Framework\Error\Error
     * @expectedExceptionMessageRegExp /^file_get_contents\(.+\): failed to open stream: No such file or directory$/
     */
    public function getFileContentTriggerPHPError()
    {
        $this->initializeSUT();

        $this->fileConsumer->getFileContent('/resource/url');
    }
}