<?php

namespace LaravelEnso\ControlPanel\App\Services\Sentry;

use GuzzleHttp\Client;
use LaravelEnso\ControlPanel\App\Models\Application;
use Psr\Http\Message\ResponseInterface;

class Api
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
        return $this->request("api/0/projects/{$this->id}/stats/");
    }

    private function request(string $path): ResponseInterface
    {
        return $this->client->request('GET', config('enso.control-panels.sentry.url').$path, [
            'headers' => [
                'Authorization' => 'Bearer '.config('enso.control-panels.sentry.token'),
            ],
        ]);
    }
}
