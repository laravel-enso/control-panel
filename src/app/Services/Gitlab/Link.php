<?php

namespace LaravelEnso\ControlPanel\App\Services\Gitlab;

use LaravelEnso\ControlPanel\App\Contracts\Api;
use LaravelEnso\ControlPanelCommon\App\Contracts\Link as Contract;

class Link implements Contract
{
    private Api $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
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
