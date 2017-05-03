<?php

namespace MyAppsSdk\Session;

class SessionData extends Collection
{

    const CUSTOMER = 'data.customer';

    const HOTSPOT = 'data.hotspot';

    const WIFI_AREA = 'data.wifiarea';

    const TENANT = 'data.tenant';

    private $customer;

    private $hotspot;

    private $wifiarea;

    private $tenant;

    /**
     * SessionData constructor.
     * @param array $rawSession
     */
    public function __construct(array $rawSession = [])
    {
        parent::__construct($rawSession);
        $this->customer = new Customer($this->getField(self::CUSTOMER, []));
        $this->hotspot = new Hotspot($this->getField(self::HOTSPOT, []));
        $this->wifiarea = new WifiArea($this->getField(self::WIFI_AREA, []));
        $this->tenant = new Tenant($this->getField(self::TENANT, []));
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @return Hotspot
     */
    public function getHotspot()
    {
        return $this->hotspot;
    }

    /**
     * @return WifiArea
     */
    public function getWifiarea()
    {
        return $this->wifiarea;
    }

    /**
     * @return Tenant
     */
    public function getTenant()
    {
        return $this->tenant;
    }

    public function getRawSession()
    {
        return $this->getItems();
    }
}
