<?php

namespace MyAppsSdk\Test\Session;

use MyAppsSdk\Session\Tenant;
use PHPUnit_Framework_TestCase;

class TenantTest extends PHPUnit_Framework_TestCase
{

    private $preAuthData;

    private $postAuthData;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->preAuthData = json_decode(file_get_contents(__DIR__ . "/../samples/pre-auth.json"), true)['data']['tenant'];

        $this->postAuthData = json_decode(file_get_contents(__DIR__ . "/../samples/post-auth.json"), true)['data']['tenant'];
    }


    public function testId()
    {
        $tenant = new Tenant($this->preAuthData);
        $this->assertEquals("1001", $tenant->getId());

        $tenant = new Tenant($this->postAuthData);
        $this->assertEquals("1001", $tenant->getId());
    }

    public function testName()
    {
        $tenant = new Tenant($this->preAuthData);
        $this->assertEquals("Galaxy Tenant", $tenant->getName());

        $tenant = new Tenant($this->postAuthData);
        $this->assertEquals("Galaxy Tenant", $tenant->getName());
    }

    public function testIsReadOnly()
    {
        $tenant = new Tenant($this->preAuthData);
        $this->assertTrue($tenant->isReadOnly());

        $tenant = new Tenant($this->postAuthData);
        $this->assertFalse($tenant->isReadOnly());
    }
}