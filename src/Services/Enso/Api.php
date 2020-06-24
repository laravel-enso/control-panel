<?php

namespace LaravelEnso\ControlPanel\Services\Enso;

use GuzzleHttp\Client;
use LaravelEnso\ControlPanel\Models\Application;
use LaravelEnso\Helpers\Classes\Obj;
use Psr\Http\Message\ResponseInterface;

class Api
{
    private Application $application;
    private Obj $params;
    private Client $client;

    public function __construct(Application $application, array $params)
    {
        $this->application = $application;
        $this->params = new Obj($params);
        $this->client = new Client();
    }

    public function call(string $method, string $uri): ResponseInterface
    {
        return $this->client->request($method, $this->url($uri), [
            'headers' => $this->headers(),
            'query' => $this->query(),
        ]);
    }

    private function url(string $uri): string
    {
        return "{$this->application->url}/{$uri}";
    }

    private function headers(): array
    {
        return ['Authorization' => "Bearer {$this->application->token}"];
    }

    private function query(): array
    {
        return ! empty($this->params)
            ? [
                'startDate' => $this->params->get('startDate'),
                'endDate' => $this->params->get('endDate'),
            ] : [];
    }
}
