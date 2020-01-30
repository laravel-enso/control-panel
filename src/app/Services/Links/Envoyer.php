<?php

namespace LaravelEnso\ControlPanel\App\Services\Gitlab;

use LaravelEnso\ControlPanel\App\Models\Application;
use LaravelEnso\ControlPanelCommon\App\Contracts\Link as Contract;

class Envoyer implements Contract
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
        return null;
    }

    public function description(): ?string
    {
        return null;
    }

    public function icon()
    {
        return ['fad', 'rocket'];
    }

    public function order(): int
    {
        return 300;
    }
}
