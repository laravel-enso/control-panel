<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 13.06.2017
 * Time: 17:39.
 */

namespace LaravelEnso\ControlPanel\app\Classes;

use Illuminate\Http\Request;
use LaravelEnso\ControlPanel\app\Models\SubscribedApp;
use LaravelEnso\Core\app\Exceptions\EnsoException;

class StatisticsRequestHub
{
    public static function getAll(Request $request, SubscribedApp $subscribedApp)
    {
        if ($subscribedApp->type == 1) {
            return StatisticsResponseGetter::retrieveLegacyGetAllResponse($request, $subscribedApp);
        }

        if ($subscribedApp->type == 2) {
            return StatisticsResponseGetter::retrieveEnsoGetAllResponse($request, $subscribedApp);
        }

        throw new EnsoException(__('Unsupported Application Type'));
    }

    public static function clearLaravelLog(Request $request, SubscribedApp $subscribedApp)
    {
        if ($subscribedApp->type == 2) {
            return StatisticsResponseGetter::retrieveClearLaravelLogResponse($request, $subscribedApp);
        }

        throw new EnsoException(__('Unsupported Application Type'));
    }
}
