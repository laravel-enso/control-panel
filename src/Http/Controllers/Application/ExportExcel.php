<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Tables\Builders\Application;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = Application::class;
}
