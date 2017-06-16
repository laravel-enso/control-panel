<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 15.06.2017
 * Time: 12:04.
 */

namespace LaravelEnso\AppStatisticsClient\app\Classes;

use LaravelEnso\Helpers\Classes\Object;

class ResponseDataWrapper extends Object
{
    public $id = 0;
    public $appName = '';
    public $status = 'green';
    public $data = [];
    public $errors = [];

    public function __construct($id, string $name)
    {
        $this->id = $id;
        $this->appName = $name;
    }

    public function addError(string $message)
    {
        $this->status = 'red';
        $this->errors[] = $message;
    }
}
