<?php

namespace LaravelEnso\ControlPanel\Services\Gitlab;

use LaravelEnso\ControlPanel\Contracts\Api;
use LaravelEnso\ControlPanelCommon\Contracts\Link as Contract;

class Link implements Contract
{
    public function __construct(private Api $api)
    {
    }

    public function id()
    {
        return 'gitlab';
    }

    public function label(): string
    {
        return 'gitlab';
    }

    public function url(): string
    {
        return $this->api->project()['web_url'];
    }

    public function tooltip(): ?string
    {
        return 'click to visit the GitLab repository';
    }

    public function icon(): array
    {
        return ['fab', 'gitlab'];
    }

    public function order(): int
    {
        return 400;
    }
}
