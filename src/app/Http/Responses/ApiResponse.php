<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\ControlPanel\App\Contracts\ApiResponsable;
use LaravelEnso\ControlPanel\App\Exceptions\ApiResponse as Exception;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\Api;

abstract class ApiResponse implements Responsable, ApiResponsable
{
    private Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function toResponse($request)
    {
        $api = new Api($this->application, $request->all());

        try {
            $response = $api->{$this->method()}();
        } catch (RequestException $exception) {
            if ($exception->hasResponse()) {
                throw Exception::error($exception->getResponse()->getBody());
            }

            throw Exception::error($exception->getMessage());
        }

        if ($response->getStatusCode() === 200) {
            return $response->getBody();
        }
    }
}
