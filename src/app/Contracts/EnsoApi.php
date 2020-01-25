<?php

namespace LaravelEnso\ControlPanel\App\Contracts;

use Psr\Http\Message\ResponseInterface;

interface EnsoApi extends BaseApi
{
    public function actions(): ResponseInterface;

    public function action(string $action): ResponseInterface;
}
