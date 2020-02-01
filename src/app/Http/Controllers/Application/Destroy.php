<?php

namespace LaravelEnso\ControlPanel\\App\Http\Controllers\Application;

use Illuminate\Routing\Controller;
use LaravelEnso\ControlPanel\\App\Models\Application;

class Destroy extends Controller
{
    public function __invoke(Application $application)
    {
        $application->delete();

        return [
            'message' => __('The application was successfully deleted'),
            'redirect' => 'administration.applications.index',
        ];
    }
}
