<?php

namespace LaravelEnso\ControlPanel\Services\Enso;

use LaravelEnso\ControlPanel\Models\Application;
use LaravelEnso\ControlPanel\Services\ApiResponse;
use Psr\Http\Message\ResponseInterface;

abstract class BaseApi extends ApiResponse
{
    private Api $api;

    public function __construct(Application $application, array $params)
    {
        $this->api = new Api($application, $params);
    }

    protected function call(string $method, string $uri): ResponseInterface
    {
        return $this->api->call($method, $uri);
    }
}
