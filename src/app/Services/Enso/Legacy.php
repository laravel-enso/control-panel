<?php

namespace LaravelEnso\ControlPanel\App\Services\Enso;

use LaravelEnso\ControlPanel\App\Contracts\LegacyApi;

class Legacy extends BaseApi implements LegacyApi
{
    public function statistics(): array
    {
        return $this->response('GET', 'api/statistics');
    }
}
