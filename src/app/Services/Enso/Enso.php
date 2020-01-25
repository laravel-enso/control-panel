<?php

namespace LaravelEnso\ControlPanel\App\Services\Enso;

use LaravelEnso\ControlPanel\App\Contracts\EnsoApi;
use Psr\Http\Message\ResponseInterface;

class Enso extends ApiRequest implements EnsoApi
{
    public function statistics(): ResponseInterface
    {
        return $this->call('GET', 'token/statistics');
    }

    public function maintenance(): ResponseInterface
    {
        return $this->call('POST', 'token/maintenance');
    }

    public function clearLog(): ResponseInterface
    {
        return $this->call('POST', 'token/clearLog');
    }
}
