<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 27.07.2016
 * Time: 9:19.
 */

namespace LaravelEnso\ControlPanel\app\Enums;

use LaravelEnso\Helpers\Classes\AbstractEnum;

class SubscribedAppTypesEnum extends AbstractEnum
{
    public function __construct()
    {
        $this->data = [
            1 => 'legacy',
            2 => 'enso',
        ];
    }

    public function getJsonKVData()
    {
        $tmp = [];
        foreach ($this->data as $key=>$value) {
            $tmp[] = [
                'key'   => $key,
                'value' => $value,
            ];
        }

        return json_encode($tmp);
    }
}
