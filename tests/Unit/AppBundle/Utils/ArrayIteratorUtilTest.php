<?php

namespace Tests\Unit\AppBundle\Utils;

use AppBundle\Service\ArrayIteratorUtil as SUT;
use PhpUnit\Framework\TestCase;

class ArrayIteratorUtilTest extends TestCase
{
    /**
     *
     * @var ArrayIteratorUtil
     */
    public $arrayIteratorUtil;

    /**
     * @var  vfsStreamDirectory
     */
    private $root;

    public function setUp()
    {

    }

    private function initializeSUT()
    {
        $this->arrayIteratorUtil = new SUT();
    }

    /**
     * CountOccurrencesInArray must return an array
     * 
     * @test
     */
    public function countOccurrencesInArrayReturnsArray()
    {
        $this->initializeSUT();
        $fileContentArray = [
            "test"
        ];
        $actual = $this->arrayIteratorUtil->countOccurrencesInArray($fileContentArray);

        $this->assertInternalType('array', $fileContentArray);
    }

    /**
     * CountOccurrencesInArray must return correct count
     *
     * @test
     */
    public function countOccurrencesInArrayReturnsCorrectCount()
    {
        $this->initializeSUT();
        $fileContentArray = [
            "test",
            "test2",
            "test"
        ];

        $actual = $this->arrayIteratorUtil->countOccurrencesInArray($fileContentArray);
        $this->assertEquals(2, $actual['test']);
        $this->assertEquals(1, $actual['test2']);
    }
}