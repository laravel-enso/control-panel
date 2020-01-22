<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\ControlPanel\App\Contracts\ApiResponsable;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\Enso\Factory;
use LaravelEnso\ControlPanel\App\Services\SafeApi;

abstract class ApiResponse implements Responsable, ApiResponsable
{
    private Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function toResponse($request)
    {
        $api = Factory::make($this->application, $request->all());

        return (new SafeApi($api))->{$this->method()}();
    }
}
