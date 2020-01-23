<?php

namespace LaravelEnso\ControlPanel\App\Services\Gitlab;

use GuzzleHttp\Client;
use LaravelEnso\ControlPanel\App\Models\Application;
use Psr\Http\Message\ResponseInterface;

class Api
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
        return $this->request('api/v4/projects/'.$this->id);
    }

    public function commits(): ResponseInterface
    {
        return $this->request("api/v4/projects/{$this->id}/repository/commits");
    }

    public function pipeline(): ResponseInterface
    {
        return $this->request("api/v4/projects/{$this->id}/pipelines");
    }

    private function request(string $path): ResponseInterface
    {
        return $this->client->request('GET', config('enso.control-panels.gitlab.url').$path, [
            'headers' => [
                'Private-Token' => config('enso.control-panels.gitlab.token'),
            ],
            'query' => $this->query(),
        ]);
    }

    private function query()
    {
        return [
            'page' => 1,
            'per_page' => 1,
        ];
    }
}
