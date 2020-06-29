<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\ControlPanel;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Exceptions\Gitlab as Exception;
use LaravelEnso\ControlPanel\Http\Responses\Gitlab as Response;
use LaravelEnso\ControlPanel\Models\Application;

class Gitlab extends Controller
{
    public function __invoke(Application $application)
    {
        if ($application->gitlab_project_id === null) {
            throw Exception::unregistered();
        }

        return new Response($application);
    }
}
