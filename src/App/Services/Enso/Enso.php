<?php

namespace LaravelEnso\ControlPanel\App\Services\Enso;

use LaravelEnso\ControlPanel\App\Contracts\EnsoApi;

class Enso extends BaseApi implements EnsoApi
{
    public function statistics(): array
    {
        return $this->response('GET', 'api/controlPanelApi/statistics');
    }

    public function actions(): array
    {
        return $this->response('GET', 'api/controlPanelApi/actions');
    }

    public function action($action)
    {
        return $this->response('POST', "api/controlPanelApi/{$action}");
    }
}
