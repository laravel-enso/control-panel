<?php

namespace LaravelEnso\ControlPanel\App\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\App\Http\Requests\ValidateApplicationRequest;
use LaravelEnso\ControlPanel\App\Models\Application;

class Store extends Controller
{
    public function __invoke(ValidateApplicationRequest $request, Application $application)
    {
        $application->fill($request->validated())->save();

        return [
            'message' => __('The application was successfully created'),
            'redirect' => 'administration.applications.edit',
            'param' => ['application' => $application->id],
        ];
    }
}
