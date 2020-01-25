<?php

namespace LaravelEnso\ControlPanel\App\Services\Sentry;

use GuzzleHttp\Client;
use LaravelEnso\ControlPanel\App\Contracts\Api as Contract;
use LaravelEnso\ControlPanel\App\Models\Application;
use Psr\Http\Message\ResponseInterface;

class Api implements Contract
{
    private $id;
    private Client $client;

    public function __construct(Application $application)
    {
        $this->id = $application->sentry;
        $this->client = new Client();
    }

    public function events(): ResponseInterface
    {
        return $this->call("api/0/projects/{$this->id}/stats/");
    }

    private function call(string $uri): ResponseInterface
    {
        return $this->client->get($this->url($uri), [
            'headers' => $this->headers(),
        ]);
    }

    private function url(string $uri): string
    {
        return config('enso.control-panel.sentry.url')."/{$uri}";
    }

    private function headers(): array
    {
        return ['Authorization' => 'Bearer '.config('enso.control-panel.sentry.token')];
    }
}
