<?php

namespace LaravelEnso\ControlPanel\App\Contracts;

interface Api
{
    public function response(string $method, string $uri): ?array;
}
