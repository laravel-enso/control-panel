<?php

namespace LaravelEnso\ControlPanel\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\Forms\Builders\Application;
use LaravelEnso\ControlPanel\Models\Application as Model;

class Edit extends Controller
{
    public function __invoke(Model $application, Application $form)
    {
        return ['form' => $form->edit($application)];
    }
}
