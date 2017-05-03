<?php

namespace MyAppsSdk\Session;

class Hotspot extends Collection
{
    const HOTSPOT_NAME = 'name';

    const HOTSPOT_ID = 'id';

    const HOTSPOT_CITY = 'city';

    const HOTSPOT_IDENTIFIER = 'identifier';

    const HOTSPOT_LAT = 'latitude';

    const HOTSPOT_LNG = 'longitude';

    const HOTSPOT_MAC_ADDRESS = 'mac_address';

    const HOTSPOT_STATE = 'state';

    const HOTSPOT_TAG = 'tag';

    const HOTSPOT_ZIP = 'zip';


    public function getName()
    {
        return $this->getField(self::HOTSPOT_NAME);
    }

    public function getId()
    {
        return $this->getField(self::HOTSPOT_ID);
    }


    public function getCity()
    {
        return $this->getField(self::HOTSPOT_CITY);
    }


    public function getIdentifier()
    {
        return $this->getField(self::HOTSPOT_IDENTIFIER);
    }

    public function getLatitude()
    {
        return $this->getField(self::HOTSPOT_LAT);
    }

    public function getLongitude()
    {
        return $this->getField(self::HOTSPOT_LNG);
    }

    public function getMacAddress()
    {
        return $this->getField(self::HOTSPOT_MAC_ADDRESS);
    }

    public function getState()
    {
        return $this->getField(self::HOTSPOT_STATE);
    }

    public function getTag()
    {
        return $this->getField(self::HOTSPOT_TAG);
    }

    public function getZip()
    {
        return $this->getField(self::HOTSPOT_ZIP);
    }
}
