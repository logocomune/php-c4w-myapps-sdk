<?php

namespace MyAppsSdk;

class Configuration implements ConfigurationInterface
{

    const API_CONTEXT_BASE_URL = "https://volare.cloud4wi.com";

    const API_CONTEXT_PATH_URL = '/controlpanel/1.0/bridge/sessions/';

    const PARM_CONTEXT_KEY = 'sk';

    private $baseUrl = self::API_CONTEXT_BASE_URL;

    private $contextPathUrl = self::API_CONTEXT_PATH_URL;

    private $contextKey = self::PARM_CONTEXT_KEY;

    private $httpHeaders;

    private $httpClientConfig = [
        'timeout' => 2, //Timeout after 2 seconds
        'allow_redirects' => true, //Follow redirects
    ];


    /**
     * Configuration constructor.
     */
    public function __construct()
    {
        $this->httpHeaders = [
            'User-Agent' => 'SDK Agent/' . MyAppsSdkInterface::VERSION,
            //  'Accept' => 'application/json',
        ];
    }


    /**
     * Get full api url wit contextKey
     *
     * @param null $contextKey
     * @return string
     */
    public function getApiCotnextUrl($contextKey = null)
    {
        return $this->baseUrl . $this->getApiContextPath($contextKey);
    }

    /**
     * @return string
     */
    public function getContextKey()
    {
        return $this->contextKey;
    }

    /**
     * @return array
     */
    public function getHttpHeaders()
    {
        return $this->httpHeaders;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string
     */
    public function getContextPathUrl()
    {
        return $this->contextPathUrl;
    }

    /**
     * @param null $contextKey
     * @return string
     */
    public function getApiContextPath($contextKey = null)
    {
        $apiPath = rtrim($this->contextPathUrl, '/');
        if ($contextKey !== null) {
            $apiPath .= '/' . $contextKey;
        }
        return $apiPath;
    }

    /**
     * @param string $contextPathUrl
     */
    public function setContextPathUrl($contextPathUrl)
    {
        $this->contextPathUrl = $contextPathUrl;
    }

    /**
     * @return null
     */
    public function getHttpClientConfig()
    {

        return array_merge(
            ['base_uri' => $this->getBaseUrl()],
            $this->httpClientConfig
        );
    }

    /**
     * @param null $httpClientConfig
     */
    public function setHttpClientConfig($httpClientConfig)
    {
        $this->httpClientConfig = $httpClientConfig;
    }
}
