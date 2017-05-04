<?php

namespace MyAppsSdk\Context;

class Hotspot extends Collection
{
    const NAME = 'name';

    const ID = 'id';

    const CITY = 'city';

    const IDENTIFIER = 'identifier';

    const LAT = 'latitude';

    const LNG = 'longitude';

    const MAC_ADDRESS = 'mac_address';

    const STATE = 'state';

    const TAG = 'tag';

    const ZIP = 'zip';


    public function getName()
    {
        return $this->getField(self::NAME);
    }

    public function getId()
    {
        return $this->getField(self::ID);
    }


    public function getCity()
    {
        return $this->getField(self::CITY);
    }


    public function getIdentifier()
    {
        return $this->getField(self::IDENTIFIER);
    }

    public function getLatitude()
    {
        return $this->getField(self::LAT);
    }

    public function getLongitude()
    {
        return $this->getField(self::LNG);
    }

    public function getMacAddress()
    {
        return $this->getField(self::MAC_ADDRESS);
    }

    public function getState()
    {
        return $this->getField(self::STATE);
    }

    public function getTag()
    {
        return $this->getField(self::TAG);
    }

    public function getZip()
    {
        return $this->getField(self::ZIP);
    }
}
