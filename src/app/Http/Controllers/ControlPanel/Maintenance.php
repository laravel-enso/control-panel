<?php

namespace LaravelEnso\ControlPanel\App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use LaravelEnso\ControlPanel\App\Http\Responses\MaintenanceResponse;
use LaravelEnso\ControlPanel\app\Models\Application;

class Maintenance extends Controller
{
    public function __invoke(Application $application)
    {
        return new MaintenanceResponse($application);
    }
}
