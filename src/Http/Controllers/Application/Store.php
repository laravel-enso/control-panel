<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Http\Requests\ValidateApplication;
use LaravelEnso\ControlPanel\Models\Application;

class Store extends Controller
{
    public function __invoke(ValidateApplication $request, Application $application)
    {
        $application->fill($request->validated());

        $application->token = $request->get('token');

        $application->save();

        return [
            'message' => __('The application was successfully created'),
            'redirect' => 'administration.applications.edit',
            'param' => ['application' => $application->id],
        ];
    }
}
