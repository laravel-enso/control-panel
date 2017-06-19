<?php

Route::group(['namespace'  => 'LaravelEnso\AppStatisticsClient\app\Http\Controllers',
              'prefix'     => 'statistics',
              'as'         => 'statistics.',
              'middleware' => ['web', 'auth', 'core'], ], function () {
                  Route::get('get/{subscribedApp}', 'AppStatisticsClientController@get')->name('get');
                  Route::get('getConsolidated', 'AppStatisticsClientController@getConsolidated')->name('getConsolidated');
                  Route::delete('clearLaravelLog/{subscribedApp}', 'AppStatisticsClientController@clearLaravelLog')->name('clearLaravelLog');
                  Route::post('', 'AppStatisticsClientController@store')->name('store');
                  Route::get('', 'AppStatisticsClientController@index')->name('index');
                  Route::delete('{subscribedApp}', 'AppStatisticsClientController@destroy')->name('destroy');
              });

//Route::group(['namespace'  => 'LaravelEnso\AppStatisticsClient\app\Http\Controllers',
//              'middleware' => ['web', 'auth', 'core'], ], function () {
//                  Route::resource('subscribedApp', 'AppStatisticsClientController');
//              });
