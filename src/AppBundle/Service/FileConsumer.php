<?php

namespace AppBundle\Service;

class FileConsumer
{
    /**
     * Undocumented function
     *
     * @param string $resourceUrl
     * @return array
     */
    public function getFileContent(string $resourceUrl) : array
    {
        return file($resourceUrl);
    }
}