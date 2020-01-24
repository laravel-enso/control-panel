<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\CacheApi;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Api;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Commit;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Issues;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Pipeline;
use LaravelEnso\ControlPanel\App\Services\SafeApi;

class Gitlab implements Responsable
{
    private SafeApi $api;

    public function __construct(Application $application)
    {
        $this->api = new SafeApi(new CacheApi(new Api($application)));
    }

    public function toResponse($request)
    {
        return [
            'statistics' => [
                'Repository' => Sensor::collection([
                    new Commit($this->api),
                    new Issues($this->api),
                    new Pipeline($this->api),
                ]),
            ],
            'url' => $this->api->project()['web_url'],
        ];
    }
}
