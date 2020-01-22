<?php

use Illuminate\Support\Facades\Route;

Route::namespace('ControlPanel')
    ->prefix('controlPanel')
    ->as('controlPanel.')
    ->group(function () {
        Route::post('statistics/{application}', 'Statistics')->name('statistics');
        Route::post('gitlab/{application}', 'Gitlab')->name('gitlab');
        Route::post('sentry/{application}', 'Sentry')->name('sentry');
        Route::post('clearLog/{application}', 'ClearLog')->name('clearLog');
        Route::post('maintenance/{application}', 'Maintenance')->name('maintenance');
    });
