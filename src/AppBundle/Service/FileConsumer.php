<?php

namespace AppBundle\Service;

class FileConsumer
{
    public function getFileContent(string $resourceUrl) : array
    {
        $lines = file($resourceUrl);
        return $lines;
    }
}