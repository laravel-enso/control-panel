<?php

namespace LaravelEnso\ControlPanel\App\Exceptions;

use LaravelEnso\Helpers\App\Exceptions\EnsoException;

class Gitlab extends EnsoException
{
    public static function unregistered()
    {
        return new static('The application is not registered on Gitlab');
    }
}
