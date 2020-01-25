<?php

namespace LaravelEnso\ControlPanel\App\Contracts;

use Psr\Http\Message\ResponseInterface;

interface BaseApi extends Api
{
    public function statistics(): ResponseInterface;
}
