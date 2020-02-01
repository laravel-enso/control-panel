<?php

namespace LaravelEnso\ControlPanel\App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelEnso\ControlPanel\App\Models\Application;

class Actions extends Controller
{
    public function __invoke(Request $request, Application $application)
    {
        return $application->baseApi($request->all())->actions();
    }
}
