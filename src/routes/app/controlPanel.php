<?php

use Illuminate\Support\Facades\Route;

Route::namespace('ControlPanel')
    ->prefix('controlPanel')
    ->as('controlPanel.')
    ->group(function () {
        Route::post('statistics/{application}', 'Statistics')->name('statistics');
        Route::post('actions/{application}', 'Actions')->name('actions');
        Route::post('action/{action}/{application}', 'Action')->name('action');
        Route::post('gitlab/{application}', 'Gitlab')->name('gitlab');
        Route::post('sentry/{application}', 'Sentry')->name('sentry');
    });
