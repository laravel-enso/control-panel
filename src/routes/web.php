<?php

Route::group(['namespace'  => 'LaravelEnso\ControlPanel\app\Http\Controllers',
              'prefix'     => 'controlPanel',
              'as'         => 'controlPanel.',
              'middleware' => ['web', 'auth', 'core'], ], function () {
                  Route::get('get/{subscribedApp}', 'ControlPanelController@get')->name('get');
                  Route::get('getConsolidated', 'ControlPanelController@getConsolidated')->name('getConsolidated');
                  Route::delete('clearLaravelLog/{subscribedApp}', 'ControlPanelController@clearLaravelLog')->name('clearLaravelLog');
                  Route::post('', 'ControlPanelController@store')->name('store');
                  Route::get('', 'ControlPanelController@index')->name('index');
                  Route::delete('{subscribedApp}', 'ControlPanelController@destroy')->name('destroy');
                  Route::post('setMaintenanceMode/{subscribedApp}', 'ControlPanelController@setMaintenanceMode')->name('setMaintenanceMode');
                  Route::post('updatePreferences/{subscribedApp}', 'ControlPanelController@updatePreferences')->name('updatePreferences');
              });

//Route::group(['namespace'  => 'LaravelEnso\ControlPanel\app\Http\Controllers',
//              'middleware' => ['web', 'auth', 'core'], ], function () {
//                  Route::resource('subscribedApp', 'ControlPanelController');
//              });
