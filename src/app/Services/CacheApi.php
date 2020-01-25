<?php

namespace LaravelEnso\ControlPanel\App\Services;

use LaravelEnso\ControlPanel\App\Contracts\Api;

class CacheApi implements Api
{
    private $api;
    private array $cache;

    public function __construct(Api $api)
    {
        $this->api = $api;
        $this->cache = [];
    }

    public function __call($name, $arguments)
    {
        return $this->cache[json_encode([$name, $arguments])]
            ??= $this->api->{$name}(...$arguments);
    }
}
