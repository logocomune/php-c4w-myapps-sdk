<?php

namespace MyAppsSdk;

class Configuration implements ConfigurationInterface
{

    const DEF_API_SESSION_BASE_URL = "https://volare.cloud4wi.com";

    const DEF_API_SESSION_PATH_URL = '/controlpanel/1.0/bridge/sessions/';

    const DEF_PARM_SESSION_KEY = 'sk';

    private $baseUrl = self::DEF_API_SESSION_BASE_URL;

    private $sessionPathUrl = self::DEF_API_SESSION_PATH_URL;

    private $sessionKey = self::DEF_PARM_SESSION_KEY;

    private $httpHeaders;

    private $httpClientConfig = [
        'timeout' => 2,
        'allow_redirects' => true,
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
     * @param null $sessionKey
     * @return string
     */
    public function getApiSessionUrl($sessionKey = null)
    {
        return $this->baseUrl . $this->getApiSessionPath($sessionKey);
    }

    /**
     * @return string
     */
    public function getSessionKey()
    {
        return $this->sessionKey;
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
    public function getSessionPathUrl()
    {
        return $this->sessionPathUrl;
    }

    public function getApiSessionPath($sessionKey = null)
    {
        $apiPath = rtrim($this->sessionPathUrl, '/');
        if ($sessionKey !== null) {
            $apiPath .= '/' . $sessionKey;
        }
        return $apiPath;
    }

    /**
     * @param string $sessionPathUrl
     */
    public function setSessionPathUrl($sessionPathUrl)
    {
        $this->sessionPathUrl = $sessionPathUrl;
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
