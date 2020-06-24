<?php

use Illuminate\Support\Facades\Route;

Route::namespace('ControlPanel')
    ->prefix('controlPanel')
    ->as('controlPanel.')
    ->group(function () {
        Route::get('statistics/{application}', 'Statistics')->name('statistics');
        Route::get('actions/{application}', 'Actions')->name('actions');
        Route::post('action/{action}/{application}', 'Action')->name('action');
        Route::get('gitlab/{application}', 'Gitlab')->name('gitlab');
        Route::get('sentry/{application}', 'Sentry')->name('sentry');
    });
