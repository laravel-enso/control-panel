<?php

namespace LaravelEnso\ControlPanel\App\Services\Gitlab;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use LaravelEnso\ControlPanel\App\Models\Application;
use LaravelEnso\ControlPanel\App\Services\ApiResponse;
use Psr\Http\Message\ResponseInterface;

class Api extends ApiResponse
{
    private int $id;
    private Client $client;
    private array $cache;

    public function __construct(Application $application)
    {
        $this->id = $application->gitlab_project_id;
        $this->client = new Client();
        $this->cache = [];
    }

    public function project(): array
    {
        return $this->response('GET', "api/v4/projects/{$this->id}");
    }

    public function commits(): array
    {
        return $this->response('GET', "api/v4/projects/{$this->id}/repository/commits");
    }

    public function pipeline(): array
    {
        return $this->response('GET', "api/v4/projects/{$this->id}/pipelines");
    }

    protected function call(string $method, string $uri): ResponseInterface
    {
        return $this->cache[$uri]
            ??= $this->client->request($method, $this->url($uri), [
                'headers' => $this->headers(),
                'query' => $this->query(),
            ]);
    }

    private function url(string $uri): string
    {
        return Config::get('enso.control-panel.gitlab.url')."/{$uri}";
    }

    private function headers(): array
    {
        return ['Private-Token' => Config::get('enso.control-panel.gitlab.token')];
    }

    private function query(): array
    {
        return [
            'page' => 1,
            'per_page' => 1,
        ];
    }
}
