<?php

namespace MyAppsSdk\Session;

class Tenant extends Collection
{

    const TENANT_NAME = 'name';

    const TENANT_READ_ONLY = 'read_only';

    const TENANT_TENANT_ID = 'tenant_id';


    public function getName()
    {
        return $this->getField(self::TENANT_NAME);
    }

    public function isReadOnly()
    {
        return (boolean)$this->getField(self::TENANT_READ_ONLY, false);
    }

    public function getId()
    {
        return $this->getField(self::TENANT_TENANT_ID);
    }
}
