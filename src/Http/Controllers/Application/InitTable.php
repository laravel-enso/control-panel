<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Tables\Builders\Application;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = Application::class;
}
