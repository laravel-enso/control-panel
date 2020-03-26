<?php

namespace LaravelEnso\ControlPanel\App\Exceptions;

use LaravelEnso\Helpers\App\Exceptions\EnsoException;

class ApiResponse extends EnsoException
{
    public static function error($message)
    {
        return new static($message);
    }

    public static function request($code)
    {
        return new static("The request failed. Response code: {$code}");
    }
}
