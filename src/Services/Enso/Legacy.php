<?php

namespace LaravelEnso\ControlPanel\Services\Enso;

use LaravelEnso\ControlPanel\Contracts\LegacyApi;

class Legacy extends BaseApi implements LegacyApi
{
    public function statistics(): array
    {
        return $this->response('GET', 'api/statistics');
    }
}
