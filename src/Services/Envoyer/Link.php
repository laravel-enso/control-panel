<?php

namespace LaravelEnso\ControlPanel\Services\Envoyer;

use LaravelEnso\ControlPanel\Models\Application;
use LaravelEnso\ControlPanelCommon\Contracts\Link as Contract;

class Link implements Contract
{
    public function __construct(private Application $application)
    {
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
