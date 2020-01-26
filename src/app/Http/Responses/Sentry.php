<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Config;
use LaravelEnso\ControlPanel\App\Http\Resources\Sensor;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\SafeApi;
use LaravelEnso\ControlPanel\App\Services\Sentry\Sensors\Events;

class Sentry implements Responsable
{
    private SafeApi $api;
    private Application $application;

    public function __construct(Application $application)
    {
        $this->api = new SafeApi($application->sentryApi());
        $this->application = $application;
    }

    public function toResponse($request)
    {
        return [
            'statistics' => [
                'Errors' => Sensor::collection([ //TODO why do we need an intermediate key?
                    new Events($this->api),
                ]),
            ],
            'url' => $this->url(),
        ];
    }

    private function url()
    {
        return Config::get('enso.control-panel.sentry.url')
            ."/{$this->application->sentry_project_uri}";
    }
}
