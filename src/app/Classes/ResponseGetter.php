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

class ResponseGetter {

    public static function getEnsoGetAllResponse(Request $request, SubscribedApp $subscribedApp) {

        $client = new Client();

        $url = $subscribedApp->url;

        $headers = [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . $subscribedApp->token,
        ];

        $query = [
            'startDate' => '2017-01-01',
            'endDate'   => '2017-12-01',
        ];

        $response = $client->request('GET', $url.'/api/v1/statistics',
            [
                'headers' => $headers,
                'query' => $query
            ]
        );

        return $response;
    }

}