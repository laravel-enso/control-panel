<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\ControlPanel;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Http\Requests\ValidateStatisticsRequest as Request;
use LaravelEnso\ControlPanel\Models\Application;

class Statistics extends Controller
{
    public function __invoke(Request $request, Application $application)
    {
        return $application->api($request->validated())->statistics();
    }
}
