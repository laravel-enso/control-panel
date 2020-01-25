<?php

namespace LaravelEnso\ControlPanel\App\Contracts;

use Psr\Http\Message\ResponseInterface;

interface EnsoApi extends BaseApi
{
    public function maintenance(): ResponseInterface;

    public function clearLog(): ResponseInterface;
}
