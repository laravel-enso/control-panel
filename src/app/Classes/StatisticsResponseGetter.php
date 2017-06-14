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

    public static function retrieveEnsoGetAllResponse(Request $request, SubscribedApp $subscribedApp) {

        $client = new Client();

        $url = $subscribedApp->url;

        $headers = [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . $subscribedApp->token,
        ];

        $query = [
            'startDate' => $request->get('startDate'),
            'endDate'   => $request->get('endDate'),
        ];

        $response = $client->request('GET', $url.'/api/v1/statistics',
            [
                'headers' => $headers,
                'query' => $query
            ]
        );

        return $response;
    }

    public static function retrieveLegacyGetAllResponse(Request $request, SubscribedApp $subscribedApp) {

        $client = new Client();

        $url = $subscribedApp->url;

        $headers = [
            'Accept'        => 'application/json',
        ];

        $query = [
            'start_date' => $request->get('startDate'),
            'end_date'   => $request->get('endDate'),
        ];

        $response = $client->request('GET', $url.'/api/statistics',
            [
                'headers' => $headers,
                'query' => $query
            ]
        );

        return $response;
    }

}