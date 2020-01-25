<?php

namespace LaravelEnso\ControlPanel\App\Services\Sentry\Sensors;

use Illuminate\Support\Collection;
use LaravelEnso\ControlPanel\App\Contracts\Sensor;
use LaravelEnso\ControlPanel\App\Services\SafeApi;

class Events implements Sensor
{
    private SafeApi $api;

    public function __construct(SafeApi $api)
    {
        $this->api = $api;
    }

    public function value()
    {
        return (new Collection($this->api->events()))
            ->reduce(fn ($sum, $event) => $sum + $event[1]);
    }

    public function description(): string
    {
        return 'number of errors in last 24 hours';
    }

    public function icon()
    {
        return 'bug';
    }

    public function class(): string
    {
        return '';
    }
}
