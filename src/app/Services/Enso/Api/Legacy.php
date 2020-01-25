<?php

namespace LaravelEnso\ControlPanel\App\Services\Enso\Api;

use LaravelEnso\ControlPanel\App\Exceptions\ApiRequest as Exception;
use Psr\Http\Message\ResponseInterface;

class Legacy extends Api
{
    private const LegacyStatistics = '/statistics';

    public function statistics(): ResponseInterface
    {
        return $this->request('GET', self::LegacyStatistics);
    }

    public function actions(): ResponseInterface
    {
        throw Exception::unsupportedOperation();
    }

    public function action($action): ResponseInterface
    {
        throw Exception::unsupportedOperation();
    }
}
