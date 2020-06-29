<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\ControlPanel;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Exceptions\Sentry as Exception;
use LaravelEnso\ControlPanel\Http\Responses\Sentry as Response;
use LaravelEnso\ControlPanel\Models\Application;

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
