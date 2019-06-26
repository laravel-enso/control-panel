<?php

namespace LaravelEnso\ControlPanel\app\Forms\Builders;

use LaravelEnso\Forms\app\Services\Form;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\app\Enums\ApplicationTypes;

class ApplicationForm
{
    private const TemplatePath = __DIR__.'/../Templates/application.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);

        $this->form->options('type', ApplicationTypes::select());
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
