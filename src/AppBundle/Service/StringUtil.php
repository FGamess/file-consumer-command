<?php

namespace AppBundle\Service;

/**
 * StringUtil class
 */
class StringUtil
{
    /**
     * Count all words in string function
     *
     * @param string $fileContentString
     * @return array
     */
    public function countWordsInString(string $fileContentString) : array
    {
        return str_word_count($fileContentString, 1);
    }

    /**
     * Count words duplicates
     *
     * @param array $wordsCount
     * @return array
     */
    public function countWordsDuplicates(array $wordsCount) : array
    {
        return array_count_values($wordsCount);
    }

    /**
     * Reverse sorting of the words duplicates array
     *
     * @param array $wordsDuplicates
     * @return array
     */
    public function reverseSortWordsDuplicates(array $wordsDuplicates) : array
    {
        arsort($wordsDuplicates);

        return $wordsDuplicates;
    }

    /**
     * Find most frequent values with given limit
     *
     * @param array $occurrencesArray
     * @param int $limit
     * @return array
     */
    public function findMostFrequentValues(array $occurrencesArray, int $limit) : array
    {
        $mostFrequentWords = [];
        foreach ($occurrencesArray as $word => $count) {
            $mostFrequentWords[] = [$word => $count];
            
            $limit--;
            if ($limit == 0) {
                break;
            }
        }

        return $mostFrequentWords;
    }
}