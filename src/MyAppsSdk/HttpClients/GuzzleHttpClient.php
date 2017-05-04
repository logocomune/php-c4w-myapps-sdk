<?php

namespace MyAppsSdk\HttpClients;

use GuzzleHttp\Client;
use MyAppsSdk\Exceptions\MyAppsHttpClientException;

class GuzzleHttpClient implements HttpClientInterface
{

    /**
     * @param $pathUrl
     * @param array $clientConfig
     * @param array $headers
     * @return string
     * @throws MyAppsHttpClientException
     */
    public function get($pathUrl, $clientConfig = [], $headers = [])
    {

        $client = new Client($clientConfig);

        try {
            $response = $client->request('GET', $pathUrl, ['debug' => false, 'headers' => $headers]);

            if ($response !== null) {
                //Return the body
                return (string)$response->getBody()->getContents();
            }
        } catch (RequestException $e) {
            $errorMsg = "Http error: " . $e->getMessage();
            throw new MyAppsHttpClientException($errorMsg);
        } catch (\Exception $e) {
            throw new MyAppsHttpClientException($e->getMessage());
        }
        throw new MyAppsHttpClientException("Client error");
    }
}
