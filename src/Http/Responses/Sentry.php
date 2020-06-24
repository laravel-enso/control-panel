<?php

namespace LaravelEnso\ControlPanel\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\ControlPanel\Models\Application;
use LaravelEnso\ControlPanel\Services\Sentry\Group;
use LaravelEnso\ControlPanel\Services\Sentry\Link;
use LaravelEnso\ControlPanelCommon\Http\Resources\Group as GroupResource;
use LaravelEnso\ControlPanelCommon\Http\Resources\Link as LinkResource;

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
            'groups' => GroupResource::collection([
                new Group($this->application->sentryApi()),
            ]),
            'links' => LinkResource::collection([
                new Link($this->application),
            ]),
        ];
    }
}
