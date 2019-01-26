<?php

namespace LaravelEnso\ControlPanel\app\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelEnso\ControlPanel\app\Forms\Builders\ApplicationForm;
use LaravelEnso\ControlPanel\app\Http\Requests\ValidateApplicationRequest;
use LaravelEnso\ControlPanel\app\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        return Application::ordered()
            ->get();
    }

    public function create(ApplicationForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateApplicationRequest $request)
    {
        $application = Application::create($request->validated());

        return [
            'message'  => __('The application was successfully created'),
            'redirect' => 'administration.applications.edit',
            'param'    => ['application' => $application->id],
        ];
    }

    public function edit(Application $application, ApplicationForm $form)
    {
        return ['form' => $form->edit($application)];
    }

    public function update(ValidateApplicationRequest $request, Application $application)
    {
        $application->update($request->validated());

        return [
            'message' => __('The application was successfully updated'),
        ];
    }

    public function destroy(Application $application)
    {
        $application->delete();

        return [
            'message'  => __('The application was successfully deleted'),
            'redirect' => 'administration.applications.index',
        ];
    }
}
