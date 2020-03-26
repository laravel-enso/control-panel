<?php

namespace LaravelEnso\ControlPanel\App\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\App\Tables\Builders\ApplicationTable;
use LaravelEnso\Tables\App\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = ApplicationTable::class;
}
