<?php

namespace LaravelEnso\ControlPanel\App\Services\Enso;

use LaravelEnso\ControlPanel\app\Models\Application;
use Psr\Http\Message\ResponseInterface;

abstract class ApiRequest
{
    private Api $api;

    public function __construct(Application $application, array $params)
    {
        $this->api = new Api($application, $params);
    }

    public function call(string $method, string $uri): ResponseInterface
    {
        return $this->api->call($method, $uri);
    }
}
