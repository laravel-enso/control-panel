<?php

namespace LaravelEnso\ControlPanel\Forms\Builders;

use LaravelEnso\ControlPanel\Enums\ApplicationTypes;
use LaravelEnso\ControlPanel\Models\Application as Model;
use LaravelEnso\Forms\Services\Form;
use LaravelEnso\Helpers\Services\Obj;

class Application
{
    private const TemplatePath = __DIR__.'/../Templates/application.json';

    private Form $form;

    public function __construct()
    {
        $this->form = (new Form($this->templatePath()))
            ->options('type', ApplicationTypes::select());
    }

    public function create(): Obj
    {
        return $this->form->create();
    }

    public function edit(Model $application): Obj
    {
        return $this->form->actions(['create', 'update', 'destroy'])
            ->value('token', null)
            ->edit($application);
    }

    protected function templatePath(): string
    {
        return self::TemplatePath;
    }
}
