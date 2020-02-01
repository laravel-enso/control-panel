<?php

namespace LaravelEnso\ControlPanel\App\Contracts;

interface EnsoApi extends LegacyApi
{
    public function actions(): array;

    public function action(string $action);
}
