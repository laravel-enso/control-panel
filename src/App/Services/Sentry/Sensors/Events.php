<?php

namespace LaravelEnso\ControlPanel\App\Services\Sentry\Sensors;

use Illuminate\Support\Collection;
use LaravelEnso\ControlPanel\App\Contracts\Api;
use LaravelEnso\ControlPanelCommon\App\Contracts\Sensor;

class Events implements Sensor
{
    private Api $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function id()
    {
        return 'events';
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
