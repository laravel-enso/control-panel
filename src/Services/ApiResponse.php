<?php

namespace LaravelEnso\ControlPanel\Services;

use GuzzleHttp\Exception\RequestException;
use LaravelEnso\ControlPanel\Contracts\Api;
use LaravelEnso\ControlPanel\Exceptions\ApiResponse as Exception;
use Psr\Http\Message\ResponseInterface;

abstract class ApiResponse implements Api
{
    public function response(string $method, string $uri): ?array
    {
        $response = $this->attemptCall($method, $uri);

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody(), true);
        }

        throw Exception::request($response->getStatusCode());
    }

    abstract protected function call(string $method, string $uri): ResponseInterface;

    private function attemptCall(string $method, string $uri)
    {
        try {
            $response = $this->call($method, $uri);
        } catch (RequestException $exception) {
            $message = $exception->hasResponse()
                ? $exception->getResponse()->getBody()
                : $exception->getMessage();

            throw Exception::error($message);
        }

        return $response;
    }
}
