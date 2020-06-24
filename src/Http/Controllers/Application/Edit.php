<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Forms\Builders\ApplicationForm;
use LaravelEnso\ControlPanel\Models\Application;

class Edit extends Controller
{
    public function __invoke(Application $application, ApplicationForm $form)
    {
        return ['form' => $form->edit($application)];
    }
}
