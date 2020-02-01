<?php

namespace LaravelEnso\ControlPanel\\App\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\\App\Tables\Builders\ApplicationTable;
use LaravelEnso\Tables\App\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = ApplicationTable::class;
}
