<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

class MaintenanceResponse extends ApiResponse
{
    public function method(): string
    {
        return 'maintenance';
    }
}
