<?php

namespace LaravelEnso\ControlPanel\App\Services\Gitlab;

use LaravelEnso\ControlPanel\App\Models\Application;
use LaravelEnso\ControlPanelCommon\App\Contracts\Link as Contract;

class Site implements Contract
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
        return null;
    }

    public function description(): ?string
    {
        return null;
    }

    public function icon()
    {
        return ['fab', 'enso'];
    }

    public function order(): int
    {
        return 100;
    }
}
