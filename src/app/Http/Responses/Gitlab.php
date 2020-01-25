<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Api;
use LaravelEnso\ControlPanel\App\Services\SafeApi;

class Gitlab implements Responsable
{
    private SafeApi $api;

    public function __construct(Application $application)
    {
        $this->api = new SafeApi($application->gitlabApi());
    }

    public function toResponse($request)
    {
        return [
            'project' => $this->api->project(),
            'lastCommit' => $this->api->commits()[0] ?? null,
            'pipeline' => $this->api->pipeline()[0] ?? null,
        ];
    }
}
