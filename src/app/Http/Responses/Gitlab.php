<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\ControlPanel\App\DTOs\Group;
use LaravelEnso\ControlPanel\App\DTOs\Link;
use LaravelEnso\ControlPanel\App\Http\Resources\Group as GroupResource;
use LaravelEnso\ControlPanel\App\Http\Resources\Link as LinkResource;
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
            'statistics' => GroupResource::collection([
                new Group('repository', 'Repository', [
                    new Commit($this->api),
                    new Issues($this->api),
                    new Pipeline($this->api),
                ]),
            ]),
            'links' => LinkResource::collection([
                new Link(
                    'gitlab', 'gitlab', $this->api->project()['web_url'],
                    ['fab', 'gitlab'], 'repository', 'this is link of repository in gitlab'
                ),
            ]),
        ];
    }
}
