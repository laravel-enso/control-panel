<?php

namespace LaravelEnso\ControlPanel\App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use LaravelEnso\ControlPanel\App\Http\Responses\ClearLog as Response;
use LaravelEnso\ControlPanel\app\Models\Application;

class ClearLog extends Controller
{
    public function __invoke(Application $application)
    {
        return new Response($application);
    }
}
