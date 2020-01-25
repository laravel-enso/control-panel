<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\ControlPanel\App\Http\Resources\Sensor;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\CacheApi;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Sensors\Commit;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Sensors\Issues;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Sensors\Pipeline;
use LaravelEnso\ControlPanel\App\Services\SafeApi;

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
            'statistics' => [
                'Repository' => Sensor::collection([ //TODO why do we need the intermediary key (Repository)
                    new Commit($this->api),
                    new Issues($this->api),
                    new Pipeline($this->api),
                ]),
            ],
            'url' => $this->api->project()['web_url'],
        ];
    }
}
