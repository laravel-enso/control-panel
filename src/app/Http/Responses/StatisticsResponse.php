<?php

namespace LaravelEnso\ControlPanel\App\Http\Responses;

class StatisticsResponse extends ApiResponse
{
    public function method(): string
    {
        return 'statistics';
    }
}
