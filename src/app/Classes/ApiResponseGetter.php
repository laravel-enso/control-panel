<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 13.06.2017
 * Time: 17:39.
 */

namespace LaravelEnso\ControlPanel\app\Classes;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use LaravelEnso\ControlPanel\app\Models\SubscribedApp;

class ApiResponseGetter
{
    public static function retrieveEnsoGetAllResponse(Request $request, SubscribedApp $subscribedApp)
    {
        $filters = (object) json_decode($request->get('filters'), true);

        $client = new Client();

        $url = $subscribedApp->url;

        $headers = [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer '.$subscribedApp->token,
        ];

        $query = [
            'startDate' => $filters->startDate,
            'endDate'   => $filters->endDate,
            'dataTypes' => $subscribedApp->preferences->dataTypes,
        ];

        $response = $client->request('GET', $url.'/api/v1/statistics',
            [
                'headers'         => $headers,
                'query'           => $query,
                'timeout'         => 3,
                'connect_timeout' => 3,
            ]
        );

        return $response;
    }

    public static function retrieveLegacyGetAllResponse(Request $request, SubscribedApp $subscribedApp)
    {
        $filters = (object) json_decode($request->get('filters'), true);

        $client = new Client();

        $url = $subscribedApp->url;

        $headers = [
            'Accept' => 'application/json',
        ];

        $query = [
            'startDate' => $filters->startDate,
            'endDate'   => $filters->endDate,
            'dataTypes' => $subscribedApp->preferences->dataTypes,
            'secret'    => $subscribedApp->secret,
        ];

        $response = $client->request('GET', $url.'/api/statistics',
            [
                'headers'         => $headers,
                'query'           => $query,
                'timeout'         => 3,
                'connect_timeout' => 3,
            ]
        );

        return $response;
    }

    public static function retrieveClearLaravelLogResponse($request, $subscribedApp)
    {
        $client = new Client();

        $url = $subscribedApp->url;

        $headers = [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer '.$subscribedApp->token,
        ];

        $query = [   ];

        $response = $client->request('DELETE', $url.'/api/v1/clearLaravelLog',
            [
                'headers'         => $headers,
                'query'           => $query,
                'timeout'         => 3,
                'connect_timeout' => 3,
            ]
        );

        return $response;
    }

    public static function retrieveSetMaintenanceModeResponse($request, $subscribedApp)
    {
        $client = new Client();

        $url = $subscribedApp->url;

        $headers = [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer '.$subscribedApp->token,
        ];

        $query = [  ];

        $response = $client->request('POST', $url.'/api/v1/setMaintenanceMode',
            [
                'headers'         => $headers,
                'query'           => $query,
                'timeout'         => 3,
                'connect_timeout' => 3,
            ]
        );

        return $response;
    }
}
