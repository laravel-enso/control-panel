<?php

namespace LaravelEnso\ControlPanel\Contracts;

interface Api
{
    public function response(string $method, string $uri): array;
}
