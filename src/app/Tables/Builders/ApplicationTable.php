<?php

namespace LaravelEnso\ControlPanel\app\Tables\Builders;

use LaravelEnso\Tables\app\Services\Table;
use LaravelEnso\ControlPanel\app\Models\Application;

class ApplicationTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/applications.json';

    public function query()
    {
        return Application::select(\DB::raw(
            'id as dtRowId, name, description, url, type, order_index'
        ));
    }
}
