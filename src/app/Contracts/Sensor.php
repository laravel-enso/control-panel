<?php

namespace LaravelEnso\ControlPanel\App\Contracts;

interface Sensor
{
    public function value();

    public function description(): string;

    public function icon();

    public function class(): string;
}
