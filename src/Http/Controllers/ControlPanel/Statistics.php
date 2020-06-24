<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use LaravelEnso\ControlPanel\Http\Requests\ValidateStatisticsRequest as Request;
use LaravelEnso\ControlPanel\Models\Application;

class Statistics extends Controller
{
    public function __invoke(Request $request, Application $application)
    {
        return $application->baseApi($request->validated())->statistics();
    }
}
