<?php

namespace LaravelEnso\ControlPanel\Services\Sentry;

use GuzzleHttp\Client;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use LaravelEnso\ControlPanel\Models\Application;
use LaravelEnso\ControlPanel\Services\ApiResponse;

class Api extends ApiResponse
{
    private $id;
    private Client $client;

    public function __construct(Application $application)
    {
        $this->id = $application->sentry_project_uri;
        $this->client = new Client();
    }

    public function events(): array
    {
        return $this->response('GET', "api/0/projects/{$this->id}/stats/");
    }

    protected function call(string $method, string $uri): Response
    {
        return Http::withHeaders($this->headers())
            ->{$method}($this->url($uri));
    }

    private function url(string $uri): string
    {
        return Config::get('enso.control-panel.sentry.url')."/{$uri}";
    }

    private function headers(): array
    {
        $token = Config::get('enso.control-panel.sentry.token');

        return ['Authorization' => "Bearer {$token}"];
    }
}
