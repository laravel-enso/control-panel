<?php

namespace LaravelEnso\ControlPanel\App\Services\Gitlab\Sensors;

use Illuminate\Support\Str;
use LaravelEnso\ControlPanel\App\Contracts\Sensor;
use LaravelEnso\ControlPanel\App\Services\SafeApi;

class Pipeline implements Sensor
{
    private SafeApi $api;

    public function __construct(SafeApi $api)
    {
        $this->api = $api;
    }

    public function value()
    {
        $pipeline = $this->api->pipeline();

        return ! empty($pipeline)
            ? Str::ucfirst($pipeline[0]['status'])
            : 'N/A';
    }

    public function description(): string
    {
        return "pipeline {$this->value()}";
    }

    public function icon()
    {
        switch ($this->value()) {
            case 'Running':
                return 'play-circle';
            case 'Pending':
                return 'pause-circle';
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
}
