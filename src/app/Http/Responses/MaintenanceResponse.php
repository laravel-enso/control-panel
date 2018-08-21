<?php

namespace LaravelEnso\ControlPanel\app\Http\Responses;

class MaintenanceResponse extends ApiResponse
{
    public function method()
    {
        return 'maintenance';
    }
}
