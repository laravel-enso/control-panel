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
            'logins'        => 'logins',
            'actions'       => 'actions',
            'failedJobs'    => 'failed jobs',
            'activeSessions'=> 'active sessions',
            'serverTime'    => 'server time',
            'logSize'       => 'log size',
        ];
    }

    public function getJsonKVData()
    {
        $tmp = [];
        foreach ($this->data as $key=>$value) {
            $tmp[] = [
                'key'   => $key,
                'value' => __($value),
            ];
        }

        return json_encode($tmp);
    }
}
