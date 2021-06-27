<?php

namespace LaravelEnso\ControlPanel\Services\Gitlab\Sensors;

use Carbon\Carbon;
use LaravelEnso\ControlPanel\Contracts\Api;
use LaravelEnso\ControlPanelCommon\Contracts\Sensor;
use LaravelEnso\ControlPanelCommon\Services\IdProvider;

class Commit extends IdProvider implements Sensor
{
    public function __construct(private Api $api)
    {
    }

    public function value()
    {
        return Carbon::parse($this->api->commits()[0]['committed_date'])
            ->diffForHumans();
    }

    public function tooltip(): string
    {
        return 'last commit time';
    }

    public function icon(): array
    {
        return ['fad', 'code-commit'];
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
