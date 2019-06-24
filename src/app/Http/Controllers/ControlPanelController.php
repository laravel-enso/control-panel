<?php

namespace LaravelEnso\ControlPanel\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\app\Http\Responses\ClearLogResponse;
use LaravelEnso\ControlPanel\app\Http\Responses\StatisticsResponse;
use LaravelEnso\ControlPanel\app\Http\Responses\MaintenanceResponse;

class ControlPanelController extends Controller
{
    public function statistics(Request $request, Application $application)
    {
        return new StatisticsResponse($application);
    }

    public function maintenance(Application $application)
    {
        return new MaintenanceResponse($application);
    }

    public function clearLog(Application $application)
    {
        return new ClearLogResponse($application);
    }
}
