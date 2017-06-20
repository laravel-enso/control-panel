<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 13.06.2017
 * Time: 17:39.
 */

namespace LaravelEnso\ControlPanel\app\Classes;

use GuzzleHttp\Client;
use LaravelEnso\Helpers\Classes\Object;

class TokenResponseGetter
{
    public static function obtainLegacyAppToken($request)
    {
        $token = new Object();
        $token->access_token = $request->get('secret') ?: 'dummy';

        return $token;
    }

    public static function obtainEnsoAppToken($request)
    {
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
            return;
        }

        $responseObj = (object) (json_decode($res->getBody(), true));

        return $responseObj;
    }

    public static function deleteEnsoAppToken($url, $token)
    {
        $client = new Client();

        $headers = [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer '.$token,
        ];

        $response = $client->request('DELETE', $url.'/api/v1/token',
            [
                'headers'         => $headers,
                'timeout'         => 6,
                'connect_timeout' => 6,
            ]
        );

        $responseStatusCode = $response->getStatusCode();
        if ($responseStatusCode !== 200) {
            throw new EnsoException(__('Could not delete token'));
        }

        return response('Deleted', 200);
    }
}
