<?php

namespace LaravelEnso\ControlPanel\App\Services\Sentry;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use LaravelEnso\ControlPanel\App\Models\Application;
use LaravelEnso\ControlPanel\App\Services\ApiResponse;
use Psr\Http\Message\ResponseInterface;

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

    protected function call(string $method, string $uri): ResponseInterface
    {
        return $this->client->request($method, $this->url($uri), [
            'headers' => $this->headers(),
        ]);
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
