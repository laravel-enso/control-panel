<?php

Route::group(['namespace'  => 'LaravelEnso\AppStatisticsClient\app\Http\Controllers',
              'prefix'     => 'statistics',
              'as'         => 'statistics.',
              'middleware' => ['web', 'auth', 'core'], ], function () {
                  Route::get('get/{subscribedApp}', 'AppStatisticsClientController@get')->name('get');
                  Route::get('getAll/{subscribedApp}', 'AppStatisticsClientController@getAll')->name('getAll');
                  Route::get('getConsolidated', 'AppStatisticsClientController@getConsolidated')->name('getConsolidated');
              });

Route::group(['namespace'  => 'LaravelEnso\AppStatisticsClient\app\Http\Controllers',
              'middleware' => ['web', 'auth', 'core'], ], function () {
                  Route::resource('statistics', 'AppStatisticsClientController');
              });
