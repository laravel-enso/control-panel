<?php

namespace LaravelEnso\ControlPanel\App\Services;

use Carbon\Carbon;
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
            ? $this->legacy()
            : $this->enso();
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

    private function enso(): ResponseInterface
    {
        return $this->request('GET', self::EnsoStatistics);
    }

    private function legacy(): ResponseInterface
    {
        return $this->request('GET', self::LegacyStatistics);
    }

    private function request(string $method, string $path): ResponseInterface
    {
        //echo "->DEBUG at <b>" . __FUNCTION__ . "</b>at <b>" . __LINE__ . '</b>$method = '.$method."<br>".PHP_EOL;
        //echo "->DEBUG at <b>" . __FUNCTION__ . "</b>at <b>" . __LINE__ . '</b>$this->application->url.$path = '.$this->application->url.$path."<br>".PHP_EOL;
        //
        ////print_r($this->application->url.$path);
        ////die();
        //print_r([
        //    'headers' => [
        //        'Api-Token' => $this->application->token,
        //    ],
        //    'query' => $this->query(),
        //]);

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
