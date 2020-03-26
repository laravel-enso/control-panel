<?php

namespace LaravelEnso\ControlPanel\App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use LaravelEnso\ControlPanel\App\Http\Requests\ValidateStatisticsRequest as Request;
use LaravelEnso\ControlPanel\App\Models\Application;

class Statistics extends Controller
{
    public function __invoke(Request $request, Application $application)
    {
        return $application->baseApi($request->validated())->statistics();
    }
}
