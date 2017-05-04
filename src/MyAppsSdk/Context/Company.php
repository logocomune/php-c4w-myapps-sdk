<?php

namespace MyAppsSdk\Context;

class Company extends Collection
{

    const NAME = 'name';

    const READ_ONLY = 'read_only';

    const TENANT_ID = 'tenant_id';


    public function getName()
    {
        return $this->getField(self::NAME);
    }

    public function isReadOnly()
    {
        return (boolean)$this->getField(self::READ_ONLY, false);
    }

    public function getId()
    {
        return $this->getField(self::TENANT_ID);
    }
}
