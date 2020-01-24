<?php

namespace LaravelEnso\ControlPanel\App\Services\Enso\Api;

use Psr\Http\Message\ResponseInterface;

class Enso extends Api
{
    public function statistics(): ResponseInterface
    {
        return $this->request('GET', '/token/statistics');
    }

    public function actions(): ResponseInterface
    {
        return $this->request('GET', '/token/actions');
    }

    public function action($action): ResponseInterface
    {
        return $this->request('POST', "/token/{$action}");
    }
}
