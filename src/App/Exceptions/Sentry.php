<?php

namespace LaravelEnso\ControlPanel\App\Exceptions;

use LaravelEnso\Helpers\App\Exceptions\EnsoException;

class Sentry extends EnsoException
{
    public static function unregistered()
    {
        return new static('The application is not registered on Sentry');
    }
}
