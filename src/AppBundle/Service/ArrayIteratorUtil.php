<?php

namespace AppBundle\Service;

class ArrayIteratorUtil
{
    public function countOccurrencesInArray(array $fileContentArray) : array
    {
        return array_count_values($fileContentArray);
    }
}