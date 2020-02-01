<?php

namespace LaravelEnso\ControlPanel\App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use LaravelEnso\ControlPanel\App\Exceptions\Sentry as Exception;
use LaravelEnso\ControlPanel\App\Http\Responses\Sentry as Response;
use LaravelEnso\ControlPanel\App\Models\Application;

class Sentry extends Controller
{
    public function __invoke(Application $application)
    {
        if ($application->sentry_project_uri === null) {
            throw Exception::unregistered();
        }

        return new Response($application);
    }
}
