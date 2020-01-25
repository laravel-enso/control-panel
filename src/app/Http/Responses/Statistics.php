<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

class Statistics extends ApiResponse
{
    public function method(): string
    {
        return 'statistics';
    }
}
