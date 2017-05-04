<?php

namespace MyAppsSdk\HttpClients;

use MyAppsSdk\Exceptions\MyAppsHttpClientException;

interface HttpClientInterface
{
    /**
     * @param $pathUrl
     * @param array $clientConfig
     * @param array $headers
     * @return string
     * @throws MyAppsHttpClientException
     */
    public function get($pathUrl, $clientConfig = [], $headers = []);
}
