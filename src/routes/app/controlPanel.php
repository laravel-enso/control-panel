<?php

use Illuminate\Support\Facades\Route;

Route::namespace('ControlPanel')
    ->prefix('controlPanel')
    ->as('controlPanel.')
    ->group(function () {
        Route::post('statistics/{application}', 'Statistics')->name('statistics');
        Route::post('clearLog/{application}', 'ClearLog')->name('clearLog');
        Route::post('maintenance/{application}', 'Maintenance')->name('maintenance');
    });
