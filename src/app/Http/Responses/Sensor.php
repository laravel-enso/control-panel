<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

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
        ];
    }
}
