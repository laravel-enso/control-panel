<?php

namespace LaravelEnso\ControlPanel\app\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\app\Http\Responses\ClearLogResponse;

class ClearLog extends Controller
{
    public function __invoke(Application $application)
    {
        return new ClearLogResponse($application);
    }
}
