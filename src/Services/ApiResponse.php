<?php

namespace LaravelEnso\ControlPanel\Services;

use Illuminate\Http\Client\Response;
use LaravelEnso\ControlPanel\Contracts\Api;
use LaravelEnso\ControlPanel\Exceptions\ApiResponse as Exception;

abstract class ApiResponse implements Api
{
    public function response(string $method, string $uri): array
    {
        $response = $this->call($method, $uri);

        if ($response->failed()) {
            throw Exception::error($response->status(), $response->body());
        }

        return  $response->json();
    }

    abstract protected function call(string $method, string $uri): Response;
}
