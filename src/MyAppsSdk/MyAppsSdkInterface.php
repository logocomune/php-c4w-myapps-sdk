<?php

namespace MyAppsSdk;

interface MyAppsSdkInterface
{

    const VERSION = '0.0.1';

    public function getContext();

    public function getContextByKey($contextKey);

    public function getContextKey();
}
