<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 27.07.2016
 * Time: 9:19.
 */

namespace LaravelEnso\ControlPanel\app\Enums;

use LaravelEnso\Helpers\Classes\AbstractEnum;

class DataTypesEnum extends AbstractEnum
{
    public function __construct()
    {
        $this->data = [
            'loginsCount'         => __('logins'),
            'actionsCount'        => __('actions'),
            'failedJobsCount'     => __('failed jobs'),
            'activeSessionsCount' => __('active sessions'),
            'serverTime'          => __('server time'),
            'logFileSize'         => __('log size'),
        ];
    }

    public function getJsonKVData()
    {
        $tmp = [];
        foreach ($this->data as $key => $value) {
            $tmp[] = [
                'key'   => $key,
                'value' => $value,
            ];
        }

        return json_encode($tmp);
    }
}
