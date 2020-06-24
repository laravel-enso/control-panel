<?php

namespace LaravelEnso\ControlPanel\Services\Forge;

use LaravelEnso\ControlPanel\Models\Application;
use LaravelEnso\ControlPanelCommon\Contracts\Link as Contract;

class Link implements Contract
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
        return 'click to visit the Forge project';
    }

    public function icon(): array
    {
        return ['fab', 'forge'];
    }

    public function order(): int
    {
        return 200;
    }
}
