<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

class Maintenance extends ApiResponse
{
    public function method(): string
    {
        return 'maintenance';
    }
}
