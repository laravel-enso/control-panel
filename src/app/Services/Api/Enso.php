<?php

namespace LaravelEnso\ControlPanel\App\Services\Api;

use GuzzleHttp\Client;
use LaravelEnso\ControlPanel\app\Enums\ApplicationTypes;
use LaravelEnso\ControlPanel\App\Enums\DataTypes;
use LaravelEnso\ControlPanel\App\Exceptions\ApiRequest as Exception;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\Helpers\App\Classes\Obj;
use Psr\Http\Message\ResponseInterface;

class Enso extends Api
{
    private const EnsoStatistics = '/token/statistics';
    private const Maintenance = '/token/maintenance';
    private const ClearLog = '/token/clearLog';

    public function statistics(): ResponseInterface
    {
        return $this->request('GET', self::EnsoStatistics);
    }

    public function maintenance(): ResponseInterface
    {
        return $this->request('POST', self::Maintenance);
    }

    public function clearLog(): ResponseInterface
    {
        return $this->request('POST', self::ClearLog);
    }
}
