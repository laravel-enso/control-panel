<?php

namespace LaravelEnso\ControlPanel\App\Services\Enso\Api;

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
