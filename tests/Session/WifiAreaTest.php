<?php

namespace MyAppsSdk\Test\Session;

use MyAppsSdk\Session\WifiArea;
use PHPUnit_Framework_TestCase;

class WifiAreaTest extends PHPUnit_Framework_TestCase
{

    private $preAuthData;

    private $postAuthData;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->preAuthData = json_decode(file_get_contents(__DIR__ . "/../samples/pre-auth.json"), true);

        $this->postAuthData = json_decode(file_get_contents(__DIR__ . "/../samples/post-auth.json"), true);
    }


    public function testId()
    {
        $wifiArea = new WifiArea($this->preAuthData);
        $this->assertEquals("ae092a5b3e283c8373ke2bf18cde0005", $wifiArea->getId());

        $wifiArea = new WifiArea($this->postAuthData);
        $this->assertEquals("ae092a5b3e283c8373ke2bf18cde0005", $wifiArea->getId());
    }

    public function testName()
    {
        $wifiArea = new WifiArea($this->preAuthData);
        $this->assertEquals("Main Venue", $wifiArea->getName());

        $wifiArea = new WifiArea($this->postAuthData);
        $this->assertEquals("Main Venue", $wifiArea->getName());
    }
}