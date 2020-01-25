<?php

namespace LaravelEnso\ControlPanel\app\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\app\Models\Application;

class Index extends Controller
{
    public function __invoke()
    {
        //TODO add resource, cc instead of sc;
        //we should add in resource a platforms section that will hold forge, envoyer and gitlab section with label, link and icon
        return Application::ordered()->get();
    }
}
