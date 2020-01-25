<?php

namespace LaravelEnso\ControlPanel\App\Services\Gitlab;

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
        $this->id = $application->gitlab;
        $this->client = new Client();
    }

    public function project(): ResponseInterface
    {
        return $this->call("api/v4/projects/{$this->id}");
    }

    public function commits(): ResponseInterface
    {
        return $this->call("api/v4/projects/{$this->id}/repository/commits");
    }

    public function pipeline(): ResponseInterface
    {
        return $this->call("api/v4/projects/{$this->id}/pipelines");
    }

    private function call(string $uri): ResponseInterface
    {
        return $this->client->get($this->url($uri), [
            'headers' => $this->headers(),
            'query' => $this->query(),
        ]);
    }

    private function url(string $uri): string
    {
        return config('enso.control-panel.gitlab.url')."/{$uri}";
    }

    private function headers(): array
    {
        return ['Private-Token' => config('enso.control-panel.gitlab.token')];
    }

    private function query(): array
    {
        return [
            'page' => 1,
            'per_page' => 1,
        ];
    }
}
