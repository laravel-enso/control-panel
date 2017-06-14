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
use LaravelEnso\Core\app\Exceptions\EnsoException;

class TokenRequestHub {

    public static function requestNewToken(Request $request) {

        if($request->get('type') == 1) {
            return TokenResponseGetter::obtainLegacyAppToken($request);
        }

        if($request->get('type') == 2) {
            return TokenResponseGetter::obtainEnsoAppToken($request);
        }

        throw new EnsoException(__('Unsupported Application Type'));
    }



}