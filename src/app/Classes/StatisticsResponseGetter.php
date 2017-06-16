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

class StatisticsResponseGetter {

    private static $clientParams = array(
        'request.options' => array(
            'timeout'         => 6,
            'connect_timeout' => 6,
        ));




    public static function retrieveEnsoGetAllResponse(Request $request, SubscribedApp $subscribedApp) {

        $filters = (object) json_decode($request->get('filters'),true);

        $client = new Client();

        $url = $subscribedApp->url;

        $headers = [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . $subscribedApp->token,
        ];

        $query = [
            'startDate' => $filters->startDate,
            'endDate'   => $filters->endDate,
            'dataTypes' => $request->get('dataTypes')
        ];

        $response = $client->request('GET', $url . '/api/v1/statistics',
            [
                'headers' => $headers,
                'query'   => $query,
            ]
        );

        return $response;
    }

    public static function retrieveLegacyGetAllResponse(Request $request, SubscribedApp $subscribedApp) {

        $filters = (object) json_decode($request->get('filters'),true);

        $client = new Client();

        $url = $subscribedApp->url;

        $headers = [
            'Accept' => 'application/json',
        ];

        $query = [
            'startDate' => $filters->startDate,
            'endDate'   => $filters->endDate,
            'dataTypes' => $request->get('dataTypes')
        ];

        $response = $client->request('GET', $url . '/api/statistics',
            [
                'headers' => $headers,
                'cookies' => ['XDEBUG_SESSION'=>'PHPSTORM'],
                'query'   => $query,
                'timeout' => 3,
                'connect_timeout' => 3
            ]
        );

        return $response;
    }

    public static function retrieveClearLaravelLogResponse($request, $subscribedApp) {

        $client = new Client();

        $url = $subscribedApp->url;

        $headers = [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . $subscribedApp->token,
        ];

        $query = [

        ];

        $response = $client->request('DELETE', $url . '/api/v1/clearLaravelLog',
            [
                'headers' => $headers,
                'query'   => $query,
            ]
        );

        return $response;
    }

}