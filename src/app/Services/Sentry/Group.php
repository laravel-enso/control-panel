<?php

namespace LaravelEnso\ControlPanel\App\Services\Sentry;

use LaravelEnso\ControlPanel\App\Contracts\Api;
use LaravelEnso\ControlPanel\App\Services\Sentry\Sensors\Events;
use LaravelEnso\ControlPanelCommon\App\Contracts\Group as Contract;

class Group implements Contract
{
    private Api $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function id()
    {
        return 'errors';
    }

    public function label(): string
    {
        return 'Errors';
    }

    public function statistics(): array
    {
        return [new Events($this->api)];
    }

    public function order(): int
    {
        return 900;
    }
}
