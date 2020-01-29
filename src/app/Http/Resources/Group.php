<?php

namespace LaravelEnso\ControlPanel\App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Group extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id(),
            'label' => $this->label(),
            'statistics' => Sensor::collection($this->statistics()),
            'order' => $this->order(),
        ];
    }
}
