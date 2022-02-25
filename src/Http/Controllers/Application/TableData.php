<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Tables\Builders\Application;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = Application::class;
}
