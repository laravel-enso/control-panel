<?php

namespace LaravelEnso\ControlPanel\app\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\App\Http\Resources\Application as Resource;
use LaravelEnso\ControlPanel\app\Models\Application;

class Index extends Controller
{
    public function __invoke()
    {
        return Resource::collection(
            Application::active()->ordered()->get()
        );
    }
}
