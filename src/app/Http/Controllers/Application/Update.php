<?php

namespace LaravelEnso\ControlPanel\App\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\App\Http\Requests\ValidateApplicationRequest;
use LaravelEnso\ControlPanel\App\Models\Application;

class Update extends Controller
{
    public function __invoke(ValidateApplicationRequest $request, Application $application)
    {
        $application->fill($request->validated());

        if ($request->filled('token')) {
            $application->token = $request->get('token');
        }

        $application->save();

        return ['message' => __('The application was successfully updated')];
    }
}
