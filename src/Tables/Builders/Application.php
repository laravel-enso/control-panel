<?php

namespace LaravelEnso\ControlPanel\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\ControlPanel\Models\Application as Model;
use LaravelEnso\Tables\Contracts\Table;

class Application implements Table
{
    private const TemplatePath = __DIR__.'/../Templates/applications.json';

    public function query(): Builder
    {
        return Model::selectRaw(
            'id, name, description, url, type, order_index, is_active'
        );
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
