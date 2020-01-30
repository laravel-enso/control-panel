<?php

namespace LaravelEnso\ControlPanel\App\Services\Gitlab;

use LaravelEnso\ControlPanel\App\Models\Application;
use LaravelEnso\ControlPanelCommon\App\Contracts\Link as Contract;

class Forge implements Contract
{
    private Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function id()
    {
        return 'forge';
    }

    public function label(): string
    {
        return 'forge';
    }

    public function url(): string
    {
        return $this->application->forge_url;
    }

    public function tooltip(): ?string
    {
        return null;
    }

    public function description(): ?string
    {
        return null;
    }

    public function icon()
    {
        return ['fad', 'server'];
    }

    public function order(): int
    {
        return 200;
    }
}
