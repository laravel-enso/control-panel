<?php

namespace LaravelEnso\ControlPanel\Services\Gitlab\Sensors;

use LaravelEnso\ControlPanel\Contracts\Api;
use LaravelEnso\ControlPanelCommon\Contracts\Sensor;

class Issues implements Sensor
{
    public function __construct(private Api $api)
    {
    }

    public function id()
    {
        return 'issue';
    }

    public function value()
    {
        return $this->api->project()['open_issues_count'];
    }

    public function tooltip(): string
    {
        return 'open issues';
    }

    public function icon(): array
    {
        return ['fad', 'exclamation-circle'];
    }

    public function class(): string
    {
        return '';
    }

    public function order(): int
    {
        return 200;
    }
}
