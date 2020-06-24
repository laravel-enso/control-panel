<?php

namespace LaravelEnso\ControlPanel\Exceptions;

use LaravelEnso\Helpers\Exceptions\EnsoException;

class Gitlab extends EnsoException
{
    public static function unregistered()
    {
        return new static('The application is not registered on Gitlab');
    }
}
