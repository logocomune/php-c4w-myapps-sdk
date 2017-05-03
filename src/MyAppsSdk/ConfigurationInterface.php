<?php

namespace MyAppsSdk;

interface ConfigurationInterface
{
    public function getSessionKey();

    public function getHttpClientConfig();

    public function getApiSessionPath($sessionKey);
}
