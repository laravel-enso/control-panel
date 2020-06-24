<?php

namespace LaravelEnso\ControlPanel\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\ControlPanel\Models\Application;
use LaravelEnso\ControlPanel\Services\Gitlab\Api;
use LaravelEnso\ControlPanel\Services\Gitlab\Group;
use LaravelEnso\ControlPanel\Services\Gitlab\Link;
use LaravelEnso\ControlPanelCommon\Http\Resources\Group as GroupResource;
use LaravelEnso\ControlPanelCommon\Http\Resources\Link as LinkResource;

class Gitlab implements Responsable
{
    private Api $api;

    public function __construct(Application $application)
    {
        $this->api = $application->gitlabApi();
    }

    public function toResponse($request)
    {
        return [
            'groups' => GroupResource::collection([
                new Group($this->api),
            ]),
            'links' => LinkResource::collection([
                new Link($this->api),
            ]),
        ];
    }
}
