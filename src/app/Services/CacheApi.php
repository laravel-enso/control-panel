<?php

namespace LaravelEnso\ControlPanel\App\Services;

use GuzzleHttp\Exception\RequestException;
use LaravelEnso\ControlPanel\App\Exceptions\ApiResponse as Exception;

class CacheApi
{
    private $api;
    private array $caches = [];

    public function __construct($api)
    {
        $this->api = $api;
    }

    public function __call($name, $arguments)
    {
        return $this->caches[json_encode([$name, $arguments])]
            ??= $response = $this->api->{$name}(...$arguments);
    }
}
