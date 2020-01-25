<?php

namespace LaravelEnso\ControlPanel\App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Sensor extends JsonResource
{
    public function toArray($request)
    {
        return [
            'value' => $this->value(),
            'icon' => $this->icon(),
            'description' => __($this->description()),
            'class' => $this->class(),
            //TODO we want tooltips
            //TODO add an id that we could use in front-end for :key
        ];
    }
}
