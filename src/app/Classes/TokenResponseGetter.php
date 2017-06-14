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
use LaravelEnso\Helpers\Classes\Object;

class TokenResponseGetter {


    public static function obtainLegacyAppToken($request) {

        $token = new Object();
        $token->access_token = $request->get('secret') ?: 'dummy';

        return $token;
    }

    public static function obtainEnsoAppToken($request) {

        $client = new Client();

        $url = $request->get('url').'/oauth/token';

        $form = [
            'grant_type'    => 'client_credentials',
            'client_id'     => $request->get('client_id'),
            'client_secret' => $request->get('secret'),
            'scope'         => '*',
        ];

        $res = $client->request('POST', $url,
            [
                'form_params' => $form,
            ]
        );

        $responseStatusCode = $res->getStatusCode();
        if ($responseStatusCode !== 200) {
            return null;
        }

        $responseObj = (object) (json_decode($res->getBody(), true));

        return $responseObj;
    }
}