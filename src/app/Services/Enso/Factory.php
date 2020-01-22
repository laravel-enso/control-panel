<?php

namespace LaravelEnso\ControlPanel\App\Services\Enso;

use LaravelEnso\ControlPanel\app\Enums\ApplicationTypes;
use LaravelEnso\ControlPanel\app\Models\Application;
use LaravelEnso\ControlPanel\App\Services\Enso\Api\Api;
use LaravelEnso\ControlPanel\App\Services\Enso\Api\Enso;
use LaravelEnso\ControlPanel\App\Services\Enso\Api\Legacy;

class Factory
{
    public static function make(Application $application, array $params = []): Api
    {
        return $params['type'] === ApplicationTypes::Enso
            || $application->type === ApplicationTypes::Enso
            ? new Enso($application, $params)
            : new Legacy($application, $params);
    }
}
