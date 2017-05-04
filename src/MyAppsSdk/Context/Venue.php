<?php

namespace MyAppsSdk\Context;

class Venue extends Collection
{
    const NAME = 'name';

    const ID = 'wifiarea_id';

    public function getName()
    {
        return $this->getField(self::NAME);
    }

    public function getId()
    {
        return $this->getField(self::ID);
    }
}
