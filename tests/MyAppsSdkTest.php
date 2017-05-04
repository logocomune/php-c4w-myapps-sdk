<?php

namespace MyAppsSdk\Test;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use MyAppsSdk\Configuration;
use MyAppsSdk\Exceptions\MyAppsRequestException;
use MyAppsSdk\Exceptions\MyAppsSdkException;
use MyAppsSdk\MyAppsSdk;
use PHPUnit_Framework_TestCase;

class MyAppsSDKTest extends PHPUnit_Framework_TestCase
{
    public function testUsesDefaultHandler()
    {
        $this->assertTrue(true);
    }


    public function testConnection()
    {
        $mock = new MockHandler([
            new Response('200', [], file_get_contents(__DIR__ . "/samples/post-auth.json")),
            new Response('200', [], '{"status":"success"}'),
            new Response('200', [], '{"status":"ko"}'),
            new Response('400', [], '{"status":"ko"}'),
            new Response('500', [], '{"status":"ko"}'),

            new RequestException("Error Communicating with Server", new Request('GET', 'test')),

        ]);

        $handler = HandlerStack::create($mock);

        $configuration = new Configuration();
        $configuration->setHttpClientConfig(['handler' => $handler]);

        $MyAppsSDK = new MyAppsSDK($configuration);
        $sessionData = $MyAppsSDK->getContextByKey('test');
        $this->assertNotFalse($sessionData);


        $sessionData = $MyAppsSDK->getContextByKey('test');
        $this->assertNotFalse($sessionData);

        $this->setExpectedException(\Exception::class);
        $sessionData = $MyAppsSDK->getContextByKey('test');

        $this->assertFalse($sessionData['sessionData']);

        $sessionData = $MyAppsSDK->getContextByKey('test');
        $this->assertFalse($sessionData['sessionData']);

        $sessionData = $MyAppsSDK->getContextByKey('test');
        $this->assertFalse($sessionData['sessionData']);
    }

    /**
     *      * @expectedException MyAppsRequestException
     */
    public function testConnectionWException()
    {
        $mock = new MockHandler([
            new Response('200', [], '{"status":"ko"}'),
            new Response('400', [], '{"status":"ko"}'),
            new Response('500', [], '{"status":"ko"}'),

            new RequestException("Error Communicating with Server", new Request('GET', 'test')),

        ]);

        $handler = HandlerStack::create($mock);

        $configuration = new Configuration();
        $configuration->setHttpClientConfig(['handler' => $handler]);

        $MyAppsSDK = new MyAppsSDK($configuration);

        $this->setExpectedException(MyAppsSdkException::class);
        $sessionData = $MyAppsSDK->getContextByKey('test');

        $sessionData = $MyAppsSDK->getContextByKey('test');

        $sessionData = $MyAppsSDK->getContextByKey('test');
    }
}
