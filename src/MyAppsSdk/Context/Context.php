<?php

namespace MyAppsSdk\Context;

class Context extends Collection
{

    const CUSTOMER = 'data.customer';

    const HOTSPOT = 'data.hotspot';

    const VENUE = 'data.wifiarea';

    const COMPANY = 'data.tenant';

    private $customer;

    private $hotspot;

    private $venue;

    private $company;

    /**
     * ContextData constructor.
     * @param array $rawContext
     */
    public function __construct(array $rawContext = [])
    {
        parent::__construct($rawContext);
        $this->customer = new Customer($this->getField(self::CUSTOMER, []));
        $this->hotspot = new Hotspot($this->getField(self::HOTSPOT, []));
        $this->venue = new Venue($this->getField(self::VENUE, []));
        $this->company = new Company($this->getField(self::COMPANY, []));
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
     * @return Venue
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }
}
