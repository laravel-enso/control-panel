<?php

namespace LaravelEnso\ControlPanel\app\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\app\Http\Requests\ValidateApplicationRequest;

class Update extends Controller
{
    public function __invoke(ValidateApplicationRequest $request, Application $application)
    {
        $application->update($request->validated());

        return ['message' => __('The application was successfully updated')];
    }
}
