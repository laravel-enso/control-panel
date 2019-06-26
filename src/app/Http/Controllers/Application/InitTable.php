<?php

namespace LaravelEnso\ControlPanel\app\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Init;
use LaravelEnso\ControlPanel\app\Tables\Builders\ApplicationTable;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = ApplicationTable::class;
}
