<?php

namespace LaravelEnso\ControlPanel\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use LaravelEnso\ControlPanelCommon\Http\Resources\Link as Resource;

class Application extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            'type' => $this->type,
            'description' => $this->description,
            'gitlab' => $this->gitlab_project_id !== null,
            'sentry' => $this->sentry_project_uri !== null,
            'links' => Resource::collection($this->links()),
        ];
    }
}
