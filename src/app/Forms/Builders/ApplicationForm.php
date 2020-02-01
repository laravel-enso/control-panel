<?php

namespace LaravelEnso\ControlPanel\App\Forms\Builders;

use LaravelEnso\ControlPanel\\App\Enums\ApplicationTypes;
use LaravelEnso\ControlPanel\\App\Models\Application;
use LaravelEnso\Forms\App\Services\Form;
use LaravelEnso\Helpers\App\Classes\Obj;

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
            ->edit($application);
    }
}
