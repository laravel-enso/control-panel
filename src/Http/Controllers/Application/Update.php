<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Http\Requests\ValidateApplication;
use LaravelEnso\ControlPanel\Models\Application;

class Update extends Controller
{
    public function __invoke(ValidateApplication $request, Application $application)
    {
        $application->fill($request->validatedExcept('token'));

        if ($request->filled('token')) {
            $application->token = $request->get('token');
        }

        $application->save();

        return ['message' => __('The application was successfully updated')];
    }
}
