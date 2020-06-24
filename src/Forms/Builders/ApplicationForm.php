<?php

namespace LaravelEnso\ControlPanel\Forms\Builders;

use LaravelEnso\ControlPanel\Enums\ApplicationTypes;
use LaravelEnso\ControlPanel\Models\Application;
use LaravelEnso\Forms\Services\Form;
use LaravelEnso\Helpers\Services\Obj;

class ApplicationForm
{
    private const TemplatePath = __DIR__.'/../Templates/application.json';

    private Form $form;

    public function __construct()
    {
        $this->form = (new Form(self::TemplatePath))
            ->options('type', ApplicationTypes::select());
    }

    public function create(): Obj
    {
        return $this->form->create();
    }

    public function edit(Application $application): Obj
    {
        return $this->form->actions(['create', 'update', 'destroy'])
            ->value('token', null)
            ->edit($application);
    }
}
