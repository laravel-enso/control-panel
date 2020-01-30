<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\SafeApi;
use LaravelEnso\ControlPanel\App\Services\Sentry\Group;
use LaravelEnso\ControlPanel\App\Services\Sentry\Link;
use LaravelEnso\ControlPanelCommon\App\Http\Resources\Group as GroupResource;
use LaravelEnso\ControlPanelCommon\App\Http\Resources\Link as LinkResource;

class Sentry implements Responsable
{
    private Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function toResponse($request)
    {
        return [
            'statistics' => GroupResource::collection([
                new Group(new SafeApi($this->application->sentryApi())),
            ]),
            'links' => LinkResource::collection([
                new Link($this->application),
            ]),
        ];
    }
}
