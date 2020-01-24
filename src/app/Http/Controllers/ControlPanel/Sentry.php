<?php

namespace LaravelEnso\ControlPanel\App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use LaravelEnso\ControlPanel\App\Http\Responses\Sentry as Resource;
use LaravelEnso\ControlPanel\app\Models\Application;

class Sentry extends Controller
{
    public function __invoke(Application $application)
    {
        return new Resource($application);
    }
}