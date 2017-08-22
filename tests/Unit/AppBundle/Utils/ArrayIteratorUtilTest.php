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

    public function setUp()
    {

    }

    private function initializeSUT()
    {
        $this->arrayIteratorUtil = new SUT();
    }

    /**
     * Count occurrences array must return an array
     * 
     * @test
     */
    public function countOccurrencesInArrayReturnsArray()
    {
        $actual = $this->arrayIteratorUtil->countOccurrences($fileContentArray);

        $this->assertInternalType('array', $fileContentArray);
    }
}