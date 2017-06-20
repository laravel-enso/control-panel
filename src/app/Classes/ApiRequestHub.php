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

class ApiRequestHub
{
    public static function getAll(Request $request, SubscribedApp $subscribedApp)
    {
        if ($subscribedApp->type == 1) {
            return ApiResponseGetter::retrieveLegacyGetAllResponse($request, $subscribedApp);
        }

        if ($subscribedApp->type == 2) {
            return ApiResponseGetter::retrieveEnsoGetAllResponse($request, $subscribedApp);
        }

        throw new EnsoException(__('Unsupported Application Type'));
    }

    public static function clearLaravelLog(Request $request, SubscribedApp $subscribedApp)
    {
        if ($subscribedApp->type == 2) {
            return ApiResponseGetter::retrieveClearLaravelLogResponse($request, $subscribedApp);
        }

        throw new EnsoException(__('Unsupported Application Type'));
    }

    public static function setMaintenanceMode(Request $request, SubscribedApp $subscribedApp)
    {
        if ($subscribedApp->type == 2) {
            return ApiResponseGetter::retrieveSetMaintenanceModeResponse($request, $subscribedApp);
        }

        throw new EnsoException(__('Unsupported Application Type'));
    }
}
