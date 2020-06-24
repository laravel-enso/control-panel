<?php

namespace LaravelEnso\ControlPanel\Services\Sentry;

use Illuminate\Support\Facades\Config;
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
        return 'sentry';
    }

    public function label(): string
    {
        return 'sentry';
    }

    public function url(): string
    {
        return  Config::get('enso.control-panel.sentry.url')
            ."/{$this->application->sentry_project_uri}";
    }

    public function tooltip(): ?string
    {
        return 'click to visit the Sentry project';
    }

    public function icon(): array
    {
        return ['fad', 'bug'];
    }

    public function order(): int
    {
        return 500;
    }
}
