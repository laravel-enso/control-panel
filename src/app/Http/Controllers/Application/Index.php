<?php

namespace LaravelEnso\ControlPanel\App\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\App\Http\Resources\Application as Resource;
use LaravelEnso\ControlPanel\App\Models\Application;

class Index extends Controller
{
    public function __invoke()
    {
        return Resource::collection(
            Application::active()->ordered()->get()
        );
    }
}
