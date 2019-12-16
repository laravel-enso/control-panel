<?php

namespace LaravelEnso\ControlPanel\app\Exceptions;

use LaravelEnso\Helpers\app\Exceptions\EnsoException;

class ApiResponse extends EnsoException
{
    public static function error($message)
    {
        return new static($message);
    }
}
