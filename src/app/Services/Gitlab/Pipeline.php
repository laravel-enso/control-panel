<?php

namespace LaravelEnso\ControlPanel\App\Services\Gitlab;

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
        return Str::ucfirst($this->api->pipeline()[0]['status']);
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
                return 'check-circle';
            case 'Failed':
                return 'times-circle';
            default:
                return 'ban';
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
