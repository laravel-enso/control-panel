<?php

namespace LaravelEnso\ControlPanel\App\Services\Gitlab\Sensors;

use Carbon\Carbon;
use LaravelEnso\ControlPanel\App\Contracts\Sensor;
use LaravelEnso\ControlPanel\App\Services\SafeApi;

class Commit implements Sensor
{
    private SafeApi $api;

    public function __construct(SafeApi $api)
    {
        $this->api = $api;
    }

    public function id()
    {
        return 'commit';
    }

    public function value()
    {
        return Carbon::parse($this->api->commits()[0]['committed_date'])
            ->diffForHumans(Carbon::now());
    }

    public function tooltip(): string
    {
        return 'commit';
    }

    public function description(): string
    {
        return 'last commit time';
    }

    public function icon()
    {
        return ['fad', 'code-commit'];
    }

    public function class(): string
    {
        return '';
    }

    public function order(): int
    {
        return 0;
    }
}
