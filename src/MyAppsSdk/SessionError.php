<?php

namespace MyAppsSdk;

class SessionError
{
    private $message;

    /**
     * SessionError constructor.
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }
}
