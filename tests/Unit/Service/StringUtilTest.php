<?php

namespace App\Tests\Unit\Utils;

use App\Service\StringUtil as SUT;
use PhpUnit\Framework\TestCase;

class StringUtilTest extends TestCase
{
    /**
     *
     * @var StringUtil
     */
    public $stringUtil;

    /**
     * @var  vfsStreamDirectory
     */
    private $root;

    public function setUp()
    {

    }

    private function initializeSUT()
    {
        $this->stringUtil = new SUT();
    }

    /**
     * countWordsInString must return an array
     * 
     * @test
     */
    public function countWordsInStringReturnsArray()
    {
        $this->initializeSUT();
        $stringContent = "My test text";
        $actual = $this->stringUtil->countWordsInString($stringContent);

        $this->assertInternalType('array', $actual);
    }

    /**
     * countWordsDuplicates must return correct count
     *
     * @test
     */
    public function countWordsDuplicatesReturnsCorrectCount()
    {
        $this->initializeSUT();
        $wordsCount = [
            0 => "My",
            1 => "test",
            2 => "string",
            3 => "is",
            4 => "just",
            5 => "a",
            6 => "string",
            7 => "to",
            8 => "test",
            9 => "something"
        ];

        $actual = $this->stringUtil->countWordsDuplicates($wordsCount);
        $this->assertEquals(2, $actual['test']);
        $this->assertEquals(2, $actual['string']);
    }
}