<?php

namespace LaravelEnso\ControlPanel\App\Services\Api;

use GuzzleHttp\Client;
use LaravelEnso\ControlPanel\app\Enums\ApplicationTypes;
use LaravelEnso\ControlPanel\App\Enums\DataTypes;
use LaravelEnso\ControlPanel\App\Exceptions\ApiRequest as Exception;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\Helpers\App\Classes\Obj;
use Psr\Http\Message\ResponseInterface;

abstract class Api
{
    private Obj $params;
    private Application $application;
    private Client $client;

    public function __construct(Application $application, array $params = [])
    {
        $this->params = new Obj($params);
        $this->application = $application;
        $this->client = new Client();
    }

    abstract public function statistics(): ResponseInterface;

    abstract public function maintenance(): ResponseInterface;

    abstract public function clearLog(): ResponseInterface;

    protected function request(string $method, string $path): ResponseInterface
    {
        return $this->client->request($method, $this->application->url.$path, [
            'headers' => [
                'Api-Token' => $this->application->token,
            ],
            'query' => $this->query(),
        ]);
    }

    private function query(): array
    {
        return $this->params->isNotEmpty()
            ? [
                'startDate' => $this->params->get('startDate'),
                'endDate' => $this->params->get('endDate'),
                'dataTypes' => json_encode(DataTypes::keys()),
            ] : [];
    }
}
