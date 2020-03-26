<?php

namespace LaravelEnso\ControlPanel\App\Services\Application;

use LaravelEnso\ControlPanel\App\Models\Application;
use LaravelEnso\ControlPanelCommon\App\Contracts\Link as Contract;

class Link implements Contract
{
    private Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function id()
    {
        return 'site';
    }

    public function label(): string
    {
        return 'site';
    }

    public function url(): string
    {
        return $this->application->url;
    }

    public function tooltip(): ?string
    {
        return 'click to visit the live application';
    }

    public function icon(): array
    {
        return ['fab', 'enso'];
    }

    public function order(): int
    {
        return 100;
    }
}
