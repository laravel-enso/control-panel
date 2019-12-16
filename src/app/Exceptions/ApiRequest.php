<?php

namespace LaravelEnso\ControlPanel\app\Exceptions;

use LaravelEnso\Helpers\app\Exceptions\EnsoException;

class ApiRequest extends EnsoException
{
    public static function unsupportedOperation()
    {
        return new static(__('Unsupported Operation for this Application'));
    }
}
