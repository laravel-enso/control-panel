<?php

namespace LaravelEnso\ControlPanel\App\Services\Api;

use GuzzleHttp\Client;
use LaravelEnso\ControlPanel\app\Enums\ApplicationTypes;
use LaravelEnso\ControlPanel\App\Enums\DataTypes;
use LaravelEnso\ControlPanel\App\Exceptions\ApiRequest as Exception;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\Helpers\App\Classes\Obj;
use Psr\Http\Message\ResponseInterface;

class Legacy extends Api
{
    private const LegacyStatistics = '/statistics';

    public function statistics(): ResponseInterface
    {
        return $this->request('GET', self::LegacyStatistics);
    }

    public function maintenance(): ResponseInterface
    {
        throw Exception::unsupportedOperation();
    }

    public function clearLog(): ResponseInterface
    {
        throw Exception::unsupportedOperation();
    }
}
