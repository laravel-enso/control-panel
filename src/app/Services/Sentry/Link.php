<?php

namespace LaravelEnso\ControlPanel\App\Services\Sentry;

use Illuminate\Support\Facades\Config;
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
        return null;
    }

    public function description(): ?string
    {
        return null;
    }

    public function icon()
    {
        return ['fad', 'bug'];
    }

    public function order(): int
    {
        return 500;
    }
}
