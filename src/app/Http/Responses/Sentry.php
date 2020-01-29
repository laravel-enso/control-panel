<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Config;
use LaravelEnso\ControlPanel\App\DTOs\Group;
use LaravelEnso\ControlPanel\App\DTOs\Link;
use LaravelEnso\ControlPanel\App\Http\Resources\Group as GroupResource;
use LaravelEnso\ControlPanel\App\Http\Resources\Link as LinkResource;
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
            'statistics' => GroupResource::collection([
                new Group('errors', 'Errors', [new Events($this->api)]),
            ]),
            'links' => LinkResource::collection([
                new Link('sentry', 'sentry', $this->url(), ['fad', 'bug']),
            ]),
        ];
    }

    private function url()
    {
        return Config::get('enso.control-panel.sentry.url')
            ."/{$this->application->sentry_project_uri}";
    }
}
