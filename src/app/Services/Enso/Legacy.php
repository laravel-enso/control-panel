<?php

namespace LaravelEnso\ControlPanel\App\Services\Enso;

use LaravelEnso\ControlPanel\App\Contracts\BaseApi;
use Psr\Http\Message\ResponseInterface;

class Legacy extends ApiRequest implements BaseApi
{
    public function statistics(): ResponseInterface
    {
        return $this->call('GET', 'statistics');
    }
}
