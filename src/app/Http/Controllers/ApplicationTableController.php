<?php

namespace LaravelEnso\ControlPanel\app\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;
use LaravelEnso\ControlPanel\app\Tables\Builders\ApplicationTable;

class ApplicationTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = ApplicationTable::class;
}
