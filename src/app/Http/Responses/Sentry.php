<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\SafeApi;

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
            'events' => $this->events(),
            'url' => $this->url(),
        ];
    }

    private function events()
    {
        return (new Collection($this->api->events()))
            ->reduce(fn ($sum, $event) => $sum + $event[1]);
    }

    private function url()
    {
        return Config::get('enso.control-panel.sentry.url')
            ."/{$this->application->sentry}";
    }
}
