<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Forms\Builders\ApplicationForm;

class Create extends Controller
{
    public function __invoke(ApplicationForm $form)
    {
        return ['form' => $form->create()];
    }
}
