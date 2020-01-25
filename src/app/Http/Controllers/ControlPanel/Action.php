<?php

namespace LaravelEnso\ControlPanel\App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\Enso\Factory;
use LaravelEnso\ControlPanel\App\Services\SafeApi;

class Action extends Controller
{
    public function __invoke(Request $request, $action, Application $application)
    {
        $api = Factory::make($application, $request->all());

        return (new SafeApi($api))->action($action);
    }
}
