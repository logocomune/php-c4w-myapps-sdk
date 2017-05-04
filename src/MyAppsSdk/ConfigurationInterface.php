<?php

namespace MyAppsSdk;

interface ConfigurationInterface
{
    public function getContextKey();

    public function getHttpClientConfig();

    public function getApiContextPath($contextKey);
}
