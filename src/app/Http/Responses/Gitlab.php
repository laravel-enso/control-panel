<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\CacheApi;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Group;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Link;
use LaravelEnso\ControlPanel\App\Services\SafeApi;
use LaravelEnso\ControlPanelCommon\App\Http\Resources\Group as GroupResource;
use LaravelEnso\ControlPanelCommon\App\Http\Resources\Link as LinkResource;

class Gitlab implements Responsable
{
    private SafeApi $api;

    public function __construct(Application $application)
    {
        $this->api = new SafeApi(
            new CacheApi($application->gitlabApi())
        );
    }

    public function toResponse($request)
    {
        return [
            'statistics' => GroupResource::collection([
                new Group($this->api)
            ]),
            'links' => LinkResource::collection([
                new Link($this->api),
            ]),
        ];
    }
}
