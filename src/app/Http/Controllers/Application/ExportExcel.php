<?php

namespace LaravelEnso\ControlPanel\app\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Excel;
use LaravelEnso\ControlPanel\app\Tables\Builders\ApplicationTable;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = ApplicationTable::class;
}
