<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\ControlPanel;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Models\Application;

class Actions extends Controller
{
    public function __invoke(Request $request, Application $application)
    {
        return $application->api($request->all())->actions();
    }
}
