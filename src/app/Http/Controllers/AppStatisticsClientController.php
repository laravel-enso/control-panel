<?php

namespace LaravelEnso\AppStatisticsClient\app\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use LaravelEnso\AppStatisticsClient\app\Http\Requests\ValidateSubscriptionRequest;

class AppStatisticsClientController extends Controller
{
    //

    public function index() {

        return 'ok';
    }

    public function subscribeToApp(Request $request) {

        $client = new Client();

        $headers = [
            'Accept'=>'application/json'
        ];

        $res = $client->request('POST', 'http://enso.dev/oauth/token/',
            [
                'form_params' => [
                    'grant_type' => 'client_credentials',
                    'client_id' => 3,
                    'client_secret' => '4JaTf5MTDuDhqL6s46mfx6KF0VG5RFlnn5XrYvUr',
                    'scope' => '*'
                ]
            ]
        );
        Log::debug($res->getStatusCode());

        Log::debug($res->getBody());

        $responseObj = (object)(json_decode($res->getBody(), true));

        \Log::debug($responseObj->access_token);

        return $res->getBody();
    }

    public function getStatistics(Request $request) {

        $client = new Client();

        $headers = [
            'Accept'=>'application/json',
            'Authorization'=>'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImY1MDhiNGViOTE1NTFhYjhmMTQwZWEyNTNjZTVjNWJjYWM0MWVlMTM1NTYzYzczNjE2ZWI2MDJiNTVhY2Q1ZDFlYWE2ZWRiY2YyZmUyYzUxIn0.eyJhdWQiOiIzIiwianRpIjoiZjUwOGI0ZWI5MTU1MWFiOGYxNDBlYTI1M2NlNWM1YmNhYzQxZWUxMzU1NjNjNzM2MTZlYjYwMmI1NWFjZDVkMWVhYTZlZGJjZjJmZTJjNTEiLCJpYXQiOjE0OTcyNjkwNDUsIm5iZiI6MTQ5NzI2OTA0NSwiZXhwIjoxNTI4ODA1MDQ1LCJzdWIiOiIiLCJzY29wZXMiOltdfQ.vdJnSCvc9OFIlvAEuKxi5S0yD0iM8gmUHvkC8ji-y22zybqSzNG5YXa7ihXpV1M3lQdAXKR4Rw1Db8P9YG1QKFYb4KWDEcdS_vwLEghkkboe2m920BemoWznGc1DcJGi_-P_-bxdWKaWc-kGTi2nlA23tY-6Xs3WGY5Els7eT1I5qW4MPHcOv4GsK595l5fm8HmVoUd7f9aQSmZET_GRF7ZU1kfiRoNhsakdwxQyNiO1-c8Ii3p9LYY31k5heNsC98lmbsiJaYo6kP5bGXZy8J-2sKDEpJJ8eBgOHRzmB0aV1oSXPvqXVOJA74-j8-zCGF108pj-82o70Vab1V49WsVhhd8xqCVzmWxD_FbRqw0Zs81dmh2Sct8uIRQJe7Pf0KJJ2lKZpVDvkQuWxkdXrIQ0LRZ-l5zllGSOiLMFtlYqSuQtLKSc0xuHQ7ElIgZ8sKvruKIKsvSmyOr01MORq8E0K-Qdzk8U9P6PEfhYRDSf7dQbYD4rJ4H1Gvro_UpYH1VP8ZsL70-pRdpbqfnmQ31ts6tGGsQRJeyalacj9GB8OLm6XAuA59CrrSCFysLzju7Jb4kJosTegXNuybT4q3Gc9usMYRIJ9XVFwHduTJCbknSne6H9_haHYe7KmBD5xf8wWvdL6BxiUxMZWOtT7t5yNPTS5rZSmnCgZuB5c3g'
        ];

        $res = $client->request('GET', 'http://enso.dev/api/statistics?startDate=2017-01-01&endDate=2017-12-01',
            [
                'headers' => $headers
            ]
        );
        Log::debug($res->getStatusCode());

        Log::debug($res->getHeader('content-type'));

        Log::debug($res->getBody());

        return $res->getBody();
    }
}
