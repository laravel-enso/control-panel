<?php

namespace LaravelEnso\ControlPanel\App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use LaravelEnso\ControlPanel\App\Exceptions\Gitlab as Exception;
use LaravelEnso\ControlPanel\App\Http\Responses\Gitlab as Response;
use LaravelEnso\ControlPanel\\App\Models\Application;

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
