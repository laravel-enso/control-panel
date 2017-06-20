<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 13.06.2017
 * Time: 17:39.
 */

namespace LaravelEnso\ControlPanel\app\Classes;

use Illuminate\Http\Request;
use LaravelEnso\Core\app\Exceptions\EnsoException;

class TokenRequestHub
{
    public static function requestNewToken(Request $request)
    {
        if ($request->get('type') == 1) {
            return TokenResponseGetter::obtainLegacyAppToken($request);
        }

        if ($request->get('type') == 2) {
            return TokenResponseGetter::obtainEnsoAppToken($request);
        }

        throw new EnsoException(__('Unsupported Application Type'));
    }

    public static function deleteToken($appType, string $url, string $token)
    {
        if ($appType == 1) {
            return response('Deleted', 200);
        }

        if ($appType == 2) {
            return TokenResponseGetter::deleteEnsoAppToken($url, $token);
        }

        throw new EnsoException(__('Unsupported Application Type'));
    }
}
