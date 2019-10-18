<?php

namespace LaravelEnso\ControlPanel\app\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\app\Contracts\Table;
use LaravelEnso\ControlPanel\app\Models\Application;

class ApplicationTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/applications.json';

    public function query(): Builder
    {
        return Application::selectRaw(
            'id, name, description, url, type, order_index'
        );
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
