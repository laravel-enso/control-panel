<?php

namespace LaravelEnso\ControlPanel\App\Services\Envoyer;

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
        return 'envoyer';
    }

    public function label(): string
    {
        return 'envoyer';
    }

    public function url(): string
    {
        return $this->application->envoyer_url;
    }

    public function tooltip(): ?string
    {
        return 'click to visit the Envoyer project';
    }

    public function icon(): array
    {
        return ['fad', 'rocket'];
    }

    public function order(): int
    {
        return 300;
    }
}
