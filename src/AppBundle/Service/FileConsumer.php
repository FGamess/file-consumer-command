<?php

namespace AppBundle\Service;

class FileConsumer
{
    /**
     * Undocumented function
     *
     * @param string $resourceUrl
     * @return string
     */
    public function getFileContent(string $resourceUrl) : string
    {
        return file_get_contents($resourceUrl);
    }
}