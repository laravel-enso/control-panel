<?php

namespace LaravelEnso\ControlPanel\app\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelEnso\ControlPanel\app\Tables\Builders\ApplicationTable;
use LaravelEnso\VueDatatable\app\Traits\Datatable;
use LaravelEnso\VueDatatable\app\Traits\Excel;

class ApplicationTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = ApplicationTable::class;
}
