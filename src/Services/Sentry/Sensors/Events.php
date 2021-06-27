<?php

namespace LaravelEnso\ControlPanel\Services\Sentry\Sensors;

use Illuminate\Support\Collection;
use LaravelEnso\ControlPanel\Contracts\Api;
use LaravelEnso\ControlPanelCommon\Contracts\Sensor;
use LaravelEnso\ControlPanelCommon\Services\IdProvider;

class Events extends IdProvider implements Sensor
{
    public function __construct(private Api $api)
    {
    }

    public function value()
    {
        return (new Collection($this->api->events()))
            ->reduce(fn ($sum, $event) => $sum + $event[1]);
    }

    public function tooltip(): string
    {
        return 'errors in last 24 hours';
    }

    public function icon(): array
    {
        return ['fad', 'bug'];
    }

    public function class(): string
    {
        return '';
    }

    public function order(): int
    {
        return 100;
    }
}
