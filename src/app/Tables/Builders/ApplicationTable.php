<?php

namespace LaravelEnso\ControlPanel\app\Tables\Builders;

use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\VueDatatable\app\Classes\Table;

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
