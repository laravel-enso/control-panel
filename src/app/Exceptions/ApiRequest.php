<?php

namespace LaravelEnso\ControlPanel\App\Exceptions;

use LaravelEnso\Helpers\App\Exceptions\EnsoException;

class ApiRequest extends EnsoException
{
    public static function unsupportedOperation()
    {
        return new static(__('Unsupported Operation for this Application'));
    }
}
