<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Http\Resources\Application as Resource;
use LaravelEnso\ControlPanel\Models\Application;

class Index extends Controller
{
    public function __invoke()
    {
        return Resource::collection(
            Application::active()->ordered()->get()
        );
    }
}
