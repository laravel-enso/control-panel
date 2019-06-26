<?php

namespace LaravelEnso\ControlPanel\app\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Data;
use LaravelEnso\ControlPanel\app\Tables\Builders\ApplicationTable;

class TableData extends Controller
{
    use Data;

    protected $tableClass = ApplicationTable::class;
}
