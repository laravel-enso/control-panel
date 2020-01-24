<?php

namespace LaravelEnso\ControlPanel\App\Services\Gitlab;

use LaravelEnso\ControlPanel\App\Services\SafeApi;
use LaravelEnso\ControlPanel\App\Contracts\Sensor;

class Issues implements Sensor
{
    private SafeApi $api;

    public function __construct(SafeApi $api)
    {
        $this->api = $api;
    }

    public function value()
    {
        return $this->api->project()['open_issues_count'];
    }

    public function description(): string
    {
        return 'issues';
    }

    public function icon()
    {
        return 'exclamation-circle';
    }

    public function class(): string
    {
        return '';
    }
}
