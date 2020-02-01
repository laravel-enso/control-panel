<?php

namespace LaravelEnso\ControlPanel\\App\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\\App\Forms\Builders\ApplicationForm;
use LaravelEnso\ControlPanel\\App\Models\Application;

class Edit extends Controller
{
    public function __invoke(Application $application, ApplicationForm $form)
    {
        return ['form' => $form->edit($application)];
    }
}
