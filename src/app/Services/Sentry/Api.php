<?php

namespace LaravelEnso\ControlPanel\App\Services\Sentry;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use LaravelEnso\ControlPanel\App\Contracts\Api as Contract;
use LaravelEnso\ControlPanel\App\Models\Application;
use Psr\Http\Message\ResponseInterface;

class Api implements Contract
{
    private $id;
    private Client $client;

    public function __construct(Application $application)
    {
        $this->id = $application->sentry_project_slug;
        $this->client = new Client();
    }

    public function events(): ResponseInterface
    {
        return $this->call("api/0/projects/{$this->id}/stats");
    }

    private function call(string $uri): ResponseInterface
    {
        return $this->client->get($this->url($uri), [
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
