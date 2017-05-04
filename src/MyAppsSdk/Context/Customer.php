<?php

namespace MyAppsSdk\Context;

class Customer extends Collection
{

    const LANG = 'lang';

    const IS_LOGGED = 'is_logged';

    const ID = 'id';

    const FIRST_NAME = 'first_name';

    const LAST_NAME = 'last_name';

    const USERNAME = 'username';

    const GENDER = 'gender';

    const BIRTH_DATE = 'birth_date';

    const PHONE = 'phone';

    const PHONE_PREFIX = 'phone_prefix';

    const EMAIL = 'email';

    const MAC_ADDRESS = 'mac_address';

    const GENDER_MALE = "M";

    const GENDER_FEMALE = "F";

    const GENDER_UNKNOWN = null;


    public function getLang()
    {
        return $this->getField(self::LANG);
    }

    public function isLogged()
    {
        return (boolean)$this->getField(self::IS_LOGGED, false);
    }

    public function getId()
    {
        return $this->getField(self::ID);
    }

    public function getFirstName()
    {
        return $this->getField(self::FIRST_NAME);
    }

    public function getLastName()
    {
        return $this->getField(self::LAST_NAME);
    }

    public function getUsername()
    {
        return $this->getField(self::USERNAME);
    }

    public function getGender()
    {
        $genderStr = trim(strtolower($this->getField(self::GENDER)));
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
        return $this->getField(self::BIRTH_DATE, null);
    }

    public function getPhone()
    {
        return $this->getField(self::PHONE);
    }

    public function getPhonePrefix()
    {
        return $this->getField(self::PHONE_PREFIX);
    }

    public function getEmail()
    {
        return $this->getField(self::EMAIL);
    }

    public function getMacAddress()
    {
        return $this->getField(self::MAC_ADDRESS, []);
    }
}
