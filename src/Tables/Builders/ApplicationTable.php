<?php

namespace LaravelEnso\ControlPanel\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\ControlPanel\Models\Application;
use LaravelEnso\Tables\Contracts\Table;

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
