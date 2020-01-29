<?php

namespace LaravelEnso\ControlPanel\App\Services\Enso;

use GuzzleHttp\Client;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\Helpers\App\Classes\Obj;
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
        return rtrim($this->application->url, '/')."/{$uri}";
    }

    private function headers(): array
    {
        return ['Api-Token' => $this->application->token];
    }

    private function query(): array
    {
        return $this->params->isNotEmpty()
            ? [
                'startDate' => $this->params->get('startDate'),
                'endDate' => $this->params->get('endDate'),
            ] : [];
    }
}
