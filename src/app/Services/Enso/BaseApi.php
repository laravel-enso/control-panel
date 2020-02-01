<?php

namespace LaravelEnso\ControlPanel\App\Services\Enso;

use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\ApiResponse;
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
