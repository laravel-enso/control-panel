<?php

namespace LaravelEnso\ControlPanel\Services\Gitlab\Sensors;

use Illuminate\Support\Str;
use LaravelEnso\ControlPanel\Contracts\Api;
use LaravelEnso\ControlPanelCommon\Contracts\Sensor;

class Pipeline implements Sensor
{
    private Api $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function id()
    {
        return 'pipeline';
    }

    public function value()
    {
        $pipeline = $this->api->pipeline();

        return ! empty($pipeline)
            ? Str::ucfirst($pipeline[0]['status'])
            : 'N/A';
    }

    public function tooltip(): string
    {
        return 'last pipeline status';
    }

    public function icon(): array
    {
        switch ($this->value()) {
            case 'Running':
                return ['fad', 'play-circle'];
            case 'Pending':
                return ['fad', 'pause-circle'];
            case 'Success':
                return ['fad', 'check-circle'];
            case 'Failed':
                return ['fad', 'times-circle'];
            default:
                return ['fad', 'ban'];
        }
    }

    public function class(): string
    {
        switch ($this->value()) {
            case 'Running':
                return 'has-text-info';
            case 'Pending':
                return 'has-text-warning';
            case 'Success':
                return 'has-text-success';
            case 'Failed':
                return 'has-text-danger';
            default:
                return '';
        }
    }

    public function order(): int
    {
        return 300;
    }
}
