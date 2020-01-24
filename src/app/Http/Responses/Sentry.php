<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\SafeApi;
use LaravelEnso\ControlPanel\App\Services\Sentry\Api;
use LaravelEnso\ControlPanel\App\Services\Sentry\Events;

class Sentry implements Responsable
{
    private SafeApi $api;
    private Application $application;

    public function __construct(Application $application)
    {
        $this->api = new SafeApi(new Api($application));
        $this->application = $application;
    }

    public function toResponse($request)
    {
        return [
            'statistics' => [
                'Errors' => Sensor::collection([
                    new Events($this->api),
                ]),
            ],
            'url' => $this->url(),
        ];
    }

    private function url(): string
    {
        return rtrim(config('enso.control-panels.sentry.url'), '/')
            .'/'.$this->application->sentry;
    }
}
