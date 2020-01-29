<?php

namespace LaravelEnso\ControlPanel\App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Link extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id(),
            'label' => ucfirst(__($this->label())),
            'url' => $this->url(),
            'icon' => $this->icon(),
            'tooltip' => $this->tooltip(),
            'description' => __($this->description()),
            'order' => $this->order(),
        ];
    }
}
