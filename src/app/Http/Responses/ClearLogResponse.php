<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

class ClearLogResponse extends ApiResponse
{
    public function method(): string
    {
        return 'clearLog';
    }
}
