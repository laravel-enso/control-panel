<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\SafeApi;
use LaravelEnso\ControlPanel\App\Services\Sentry\Api;

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
            'events' => $this->events(),
            'webUrl' => config('enso.control-panels.sentry.url').'/'.$this->application->sentry,
        ];
    }

    private function events()
    {
        return collect($this->api->events())
            ->reduce(fn ($sum, $event) => $sum + $event[1]);
    }
}
