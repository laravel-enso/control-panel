<?php

namespace LaravelEnso\ControlPanel\App\Services\Gitlab\Sensors;

use LaravelEnso\ControlPanel\App\Contracts\Api;
use LaravelEnso\ControlPanelCommon\App\Contracts\Sensor;

class Issues implements Sensor
{
    private Api $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
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
        return 'issues';
    }

    public function description(): ?string
    {
        return null;
    }

    public function icon()
    {
        return 'exclamation-circle';
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
