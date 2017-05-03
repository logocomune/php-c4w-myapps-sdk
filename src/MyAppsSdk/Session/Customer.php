<?php

namespace MyAppsSdk\Session;

class Customer extends Collection
{

    const CUSTOMER_LANG = 'lang';

    const CUSTOMER_IS_LOGGED = 'is_logged';

    const CUSTOMER_ID = 'id';

    const CUSTOMER_FIRST_NAME = 'first_name';

    const CUSTOMER_LAST_NAME = 'last_name';

    const CUSTOMER_USERNAME = 'username';

    const CUSTOMER_GENDER = 'gender';

    const CUSTOMER_BIRTH_DATE = 'birth_date';

    const CUSTOMER_PHONE = 'phone';

    const CUSTOMER_PHONE_PREFIX = 'phone_prefix';

    const CUSTOMER_EMAIL = 'email';

    const CUSTOMER_MAC_ADDRESS = 'mac_address';

    const GENDER_MALE = "M";

    const GENDER_FEMALE = "F";

    const GENDER_UNKNOWN = null;


    public function getLang()
    {
        return $this->getField(self::CUSTOMER_LANG);
    }

    public function getIsLogged()
    {
        return (boolean)$this->getField(self::CUSTOMER_IS_LOGGED, false);
    }

    public function getId()
    {
        return $this->getField(self::CUSTOMER_ID);
    }

    public function getFirstName()
    {
        return $this->getField(self::CUSTOMER_FIRST_NAME);
    }

    public function getLastName()
    {
        return $this->getField(self::CUSTOMER_LAST_NAME);
    }

    public function getUsername()
    {
        return $this->getField(self::CUSTOMER_USERNAME);
    }

    public function getGender()
    {
        $genderStr = trim(strtolower($this->getField(self::CUSTOMER_GENDER)));
        if (strpos($genderStr, 'm') === 0) {
            return self::GENDER_MALE;
        }
        if (strpos($genderStr, 'f') === 0) {
            return self::GENDER_FEMALE;
        }
        return self::GENDER_UNKNOWN;
    }

    public function getBirthDate()
    {
        return $this->getField(self::CUSTOMER_BIRTH_DATE, null);
    }

    public function getPhone()
    {
        return $this->getField(self::CUSTOMER_PHONE);
    }

    public function getPhonePrefix()
    {
        return $this->getField(self::CUSTOMER_PHONE_PREFIX);
    }

    public function getEmail()
    {
        return $this->getField(self::CUSTOMER_EMAIL);
    }

    public function getMacAddress()
    {
        return $this->getField(self::CUSTOMER_MAC_ADDRESS, []);
    }
}
