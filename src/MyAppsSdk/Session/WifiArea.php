<?php

namespace MyAppsSdk\Session;

class WifiArea extends Collection
{
    const WIFI_AREA_NAME = 'data.wifiarea.name';

    const WIFI_AREA_ID = 'data.wifiarea.wifiarea_id';

    public function getName()
    {
        return $this->getField(self::WIFI_AREA_NAME);
    }

    public function getId()
    {
        return $this->getField(self::WIFI_AREA_ID);
    }
}
