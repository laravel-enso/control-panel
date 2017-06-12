<?php

Route::group(['namespace' => 'LaravelEnso\AppStatisticsClient\app\Http\Controllers',
    'prefix'              => 'statistics', 'as' => 'statistics.', 'middleware' => ['web', 'auth', 'core'], ], function () {
        Route::get('', 'AppStatisticsClientController@index')->name('index');
        Route::get('subscribeToApp', 'AppStatisticsClientController@subscribeToApp')->name('subscribeToApp');
    });
