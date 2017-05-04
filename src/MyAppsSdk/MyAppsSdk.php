<?php

namespace MyAppsSdk;

use MyAppsSdk\Context\Context;
use MyAppsSdk\Exceptions\MyAppsHttpClientException;
use MyAppsSdk\Exceptions\MyAppsRequestException;
use MyAppsSdk\HttpClients\GuzzleHttpClient;

class MyAppsSdk implements MyAppsSdkInterface
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
     * Return the context key from url params
     *
     * @return null/string
     */
    public function getContextKey()
    {
        $key = $this->configurations->getContextKey();
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
     * @param $contextKey
     * @return Context
     * @throws MyAppsHttpClientException
     * @throws MyAppsRequestException
     */
    public function getContextByKey($contextKey)
    {

        if ($contextKey !== null && $contextKey !== '') {
            $client = new GuzzleHttpClient();

            //@throws MyAppsHttpClientException
            $body = $client->get($this->configurations->getApiContextPath($contextKey), $this->configurations->getHttpClientConfig(), $this->configurations->getHttpHeaders());

            $rawContext = json_decode($this->removeBOM($body), true);

            if (!empty($rawContext) && isset($rawContext['status']) && $rawContext['status'] === 'success') {
                return new Context($rawContext);
            } else {
                $errorMsg = "Bad content";

                throw new MyAppsRequestException($errorMsg);
            }
        } else {
            throw new MyAppsRequestException("No context key");
        }
        throw new MyAppsRequestException("Unknown error");
    }


    /**
     * @return Context
     */
    public function getContext()
    {
        return $this->getContextByKey($this->getContextKey());
    }
}
