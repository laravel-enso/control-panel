<?php

namespace LaravelEnso\ControlPanel\App\Services;

use GuzzleHttp\Client;
use LaravelEnso\ControlPanel\app\Enums\ApplicationTypes;
use LaravelEnso\ControlPanel\App\Enums\DataTypes;
use LaravelEnso\ControlPanel\App\Exceptions\ApiRequest as Exception;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\Helpers\App\Classes\Obj;
use Psr\Http\Message\ResponseInterface;

class Api
{
    private const EnsoStatistics = '/api/token/statistics';
    private const LegacyStatistics = '/api/statistics';
    private const Maintenance = '/api/token/maintenance';
    private const ClearLog = '/api/token/clearLog';

    private Obj $params;
    private Application $application;
    private Client $client;

    public function __construct(Application $application, array $params = [])
    {
        $this->params = new Obj($params);
        $this->application = $application;
        $this->client = new Client();
    }

    public function statistics()
    {
        return $this->params->get('type') === ApplicationTypes::Legacy
            ? $this->request('GET', self::LegacyStatistics)
            : $this->request('GET', self::EnsoStatistics);
    }

    public function maintenance(): ResponseInterface
    {
        if ($this->application->type === ApplicationTypes::Enso) {
            return $this->request('POST', self::Maintenance);
        }

        throw Exception::unsupportedOperation();
    }

    public function clearLog(): ResponseInterface
    {
        if ($this->application->type === ApplicationTypes::Enso) {
            return $this->request('POST', self::ClearLog);
        }

        throw Exception::unsupportedOperation();
    }

    private function request(string $method, string $path): ResponseInterface
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
