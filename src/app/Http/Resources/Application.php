<?php

namespace LaravelEnso\ControlPanel\App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use LaravelEnso\ControlPanel\App\DTOs\Link;
use LaravelEnso\ControlPanel\App\Http\Resources\Link as Resource;

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
            'links' => Resource::collection([
                new Link('forge', 'forge', $this->forge_url, ['fad', 'server']),
                new Link('envoyer', 'envoyer', $this->envoyer_url, ['fad', 'rocket']),
                new Link('site', 'site', $this->url, ['fab', 'enso']),
            ]),
        ];
    }
}
