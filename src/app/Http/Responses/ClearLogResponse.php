<?php

namespace LaravelEnso\ControlPanel\app\Http\Responses;

class ClearLogResponse extends ApiResponse
{
    public function method()
    {
        return 'clearLog';
    }
}
