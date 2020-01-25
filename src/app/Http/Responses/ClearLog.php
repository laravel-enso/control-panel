<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

class ClearLog extends ApiResponse
{
    public function method(): string
    {
        return 'clearLog';
    }
}
