<?php

namespace LaravelEnso\ControlPanel\app\Http\Responses;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\ControlPanel\app\Classes\Api;
use LaravelEnso\ControlPanel\app\Contracts\ApiResponsable;
use LaravelEnso\ControlPanel\app\Exceptions\ApiResponseException;
use LaravelEnso\ControlPanel\app\Models\Application;

abstract class ApiResponse implements Responsable, ApiResponsable
{
    private $application;

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
                throw new ApiResponseException($exception->getResponse()->getBody());
            }

            throw new ApiResponseException($exception->getMessage());
        }

        if ($response->getStatusCode() === 200) {
            return $response->getBody();
        }
    }
}
