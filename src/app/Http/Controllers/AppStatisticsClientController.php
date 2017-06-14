<?php

namespace LaravelEnso\AppStatisticsClient\app\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use LaravelEnso\AppStatisticsClient\app\Classes\ResponseGetter;
use LaravelEnso\AppStatisticsClient\app\Enums\SubscribedAppTypesEnum;
use LaravelEnso\AppStatisticsClient\app\Http\Requests\ValidateSubscriptionRequest;
use LaravelEnso\AppStatisticsClient\app\Models\SubscribedApp;
use LaravelEnso\Core\app\Exceptions\EnsoException;

class AppStatisticsClientController extends Controller {

    public function index() {

        $activeApps = json_encode(SubscribedApp::all());
        $subscribedAppTypes = (new SubscribedAppTypesEnum())->getJsonKVData();

        return view('laravel-enso/app-statistics-client::appStatisticsClient.index',
            compact('activeApps', 'subscribedAppTypes'));
    }

    public function store(Request $request) {

        $tokenResponseData = $this->requestNewToken($request);

        if (!$tokenResponseData) {
            throw new EnsoException(__('Unable to get token. Check data!'));
        }

        try {

            $newSubscribedApp = null;

            DB::transaction(function () use ($request, $tokenResponseData, &$newSubscribedApp) {

                $newSubscribedApp = new SubscribedApp($request->all());
                $newSubscribedApp->token = $tokenResponseData->access_token;
                $newSubscribedApp->save();
            });

            return $newSubscribedApp;

        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            $this->deleteToken($tokenResponseData->id);
        }
    }

    public function getAll(Request $request, SubscribedApp $subscribedApp) {

        $response = ResponseGetter::getEnsoGetAllResponse($request, $subscribedApp);

        return [
            'appName' => $subscribedApp->name,
            'data' => json_decode($response->getBody(), true)
        ];
    }

    public function getConsolidated(Request $request) {

        $activeApps = SubscribedApp::all();

        $result = [];

        foreach ($activeApps as $app) {
            $result[] = $this->getAll($request, $app);
        }

        return $result;
    }

    public function get() {

        return 'get';
    }

    public function show() {

        return 'show';
    }

    private function requestNewToken(Request $request) {

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

    private function deleteToken($id) {

        //not supported by laravel

        /*
        $client = new Client();

        $headers = [
            'Accept'=>'application/json'
        ];

        $res = $client->request('DELETE', 'http://enso.dev/oauth/tokens/' . $id);

        $responseStatusCode = $res->getStatusCode();
        if($responseStatusCode !== 200) {
            throw new EnsoException(__('Could not delete token'));
        }
        */
    }
}
