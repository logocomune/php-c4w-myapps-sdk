<?php

namespace MyAppsSdk;

interface MyAppsSdkInterface
{

    const VERSION = '0.0.1';

    public function getSession();

    public function getSessionBySK($sessionKey);

    public function getSessionKey();
}
