<?php

namespace LaravelEnso\ControlPanel\Services\Sentry;

use LaravelEnso\ControlPanel\Contracts\Api;
use LaravelEnso\ControlPanel\Services\Sentry\Sensors\Events;
use LaravelEnso\ControlPanelCommon\Contracts\Group as Contract;

class Group implements Contract
{
    public function __construct(private Api $api)
    {
    }

    public function id(): string
    {
        return 'errors';
    }

    public function label(): string
    {
        return 'Errors';
    }

    public function sensors(): array
    {
        return [new Events($this->api)];
    }

    public function order(): int
    {
        return 900;
    }
}
