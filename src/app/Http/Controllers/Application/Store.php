<?php

namespace LaravelEnso\ControlPanel\app\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\app\Http\Requests\ValidateApplicationRequest;

class Store extends Controller
{
    public function __invoke(ValidateApplicationRequest $request, Application $application)
    {
        $application->fill($request->validated())
            ->save();

        return [
            'message' => __('The application was successfully created'),
            'redirect' => 'administration.applications.edit',
            'param' => ['application' => $application->id],
        ];
    }
}
