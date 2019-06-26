<?php

namespace LaravelEnso\ControlPanel\app\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\app\Forms\Builders\ApplicationForm;

class Create extends Controller
{
    public function __invoke(ApplicationForm $form)
    {
        return ['form' => $form->create()];
    }
}
