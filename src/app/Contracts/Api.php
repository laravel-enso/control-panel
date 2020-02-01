<?php

namespace LaravelEnso\ControlPanel\App\Contracts;

use Psr\Http\Message\ResponseInterface;

interface Api
{
    public function response(string $method, string $uri): ?array;
}
