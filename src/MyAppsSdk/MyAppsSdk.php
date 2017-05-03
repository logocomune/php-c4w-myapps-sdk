<?php

namespace MyAppsSdk;

use MyAppsSdk\Exceptions\MyAppsRequestException;
use MyAppsSdk\HttpClients\GuzzleHttpClient;
use MyAppsSdk\Session\SessionData;

class MyAppsSdk
{

    private $configurations;


    /**
     * MyAppsSdk constructor.
     * @param Configuration|null $configuration
     */
    public function __construct(Configuration $configuration = null)
    {
        if ($configuration === null) {
            $this->configurations = new Configuration();
        } else {
            $this->configurations = $configuration;
        }
    }

    /**
     * Return the session key from url params
     *
     * @return null/string
     */
    public function getSessionKey()
    {
        $key = $this->configurations->getSessionKey();
        if (isset($_GET[$key])) {
            return trim($_GET[$key]);
        }
        return null;
    }

    /**
     * Remove Byte Order Mark
     * http://stackoverflow.com/questions/17219916/json-decode-returns-json-error-syntax-but-online-formatter-says-the-json-is-ok
     * @param $data
     * @return bool|string
     */
    private function removeBOM($data)
    {
        if (0 === strpos(bin2hex($data), 'efbbbf')) {
            return substr($data, 3);
        }
        return $data;
    }

    /**
     * @param $sessionKey
     * @return SessionData
     * @throws MyAppsRequestException
     */
    public function getSessionBySK($sessionKey)
    {
        if ($sessionKey !== null && $sessionKey !== '') {
            $body = GuzzleHttpClient::get($this->configurations->getApiSessionPath($sessionKey), $this->configurations->getHttpClientConfig(), $this->configurations->getHttpHeaders());


            $rawSession = json_decode($this->removeBOM($body), true);

            if (!empty($rawSession) && isset($rawSession['status']) && $rawSession['status'] === 'success') {
                return new SessionData($rawSession);
            } else {
                $errorMsg = "Bad content";

                throw new MyAppsRequestException($errorMsg);
            }
        } else {
            throw new MyAppsRequestException("No session key");
        }
        throw new MyAppsRequestException("Unknown error");
    }


    /**
     * @return SessionData
     */
    public function getSession()
    {
        return $this->getSessionBySK($this->getSessionKey());
    }
}
