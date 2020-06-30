<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\ControlPanel;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Models\Application;

class Action extends Controller
{
    public function __invoke(Request $request, $action, Application $application)
    {
        return $application->baseApi($request->all())->action($action);
    }
}
