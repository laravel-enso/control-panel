<?php

namespace LaravelEnso\ControlPanel\App\Contracts;

interface Sensor
{
    //TODO add an id() that we could use in fornt-end as :key
    //TODO add tooltip()

    public function class(): string;

    public function description(): string;

    public function icon();

    public function value();
}
