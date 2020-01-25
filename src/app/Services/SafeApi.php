<?php

namespace LaravelEnso\ControlPanel\App\Services;

use GuzzleHttp\Exception\RequestException;
use LaravelEnso\ControlPanel\App\Contracts\Api;
use LaravelEnso\ControlPanel\App\Exceptions\ApiResponse as Exception;

class SafeApi
{
    private $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function __call($name, $arguments)
    {
        try {
            $response = $this->api->{$name}(...$arguments);
        } catch (RequestException $exception) {
            $message = $exception->hasResponse()
                ? $exception->getResponse()->getBody()
                : $exception->getMessage();

            throw Exception::error($message);
        }

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody(), true);
        }

        throw Exception::request($response->getStatusCode());
    }
}
