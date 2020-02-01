<?php

namespace LaravelEnso\ControlPanel\\App\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\\App\Forms\Builders\ApplicationForm;

class Create extends Controller
{
    public function __invoke(ApplicationForm $form)
    {
        return ['form' => $form->create()];
    }
}
