<?php

namespace LaravelEnso\ControlPanel\App\Forms\Builders;

use LaravelEnso\ControlPanel\app\Enums\ApplicationTypes;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\Forms\App\Services\Form;

class ApplicationForm
{
    private const TemplatePath = __DIR__.'/../Templates/application.json';

    private Form $form;

    public function __construct()
    {
        $this->form = (new Form(self::TemplatePath))
            ->options('type', ApplicationTypes::select());
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Application $application)
    {
        return $this->form->actions(['create', 'update', 'destroy'])
            ->edit($application);
    }
}
