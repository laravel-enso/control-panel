<?php

namespace LaravelEnso\ControlPanel\\App\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\\App\Tables\Builders\ApplicationTable;
use LaravelEnso\Tables\App\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = ApplicationTable::class;
}
