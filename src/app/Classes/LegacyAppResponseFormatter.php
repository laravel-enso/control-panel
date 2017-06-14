<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 13.06.2017
 * Time: 17:39
 */

namespace LaravelEnso\AppStatisticsClient\app\Classes;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use LaravelEnso\AppStatisticsClient\app\Models\SubscribedApp;

class LegacyAppResponseFormatter {

    public static function format($response) {

        \Log::debug($response);

        return $response;
    }



}