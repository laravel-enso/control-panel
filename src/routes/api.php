<?php

Route::namespace('LaravelEnso\ControlPanel\app\Http\Controllers')
    ->middleware(['web', 'auth', 'core'])
    ->prefix('api')
    ->group(function () {
        Route::prefix('controlPanel')->as('controlPanel.')
            ->group(function () {
                Route::post('statistics/{application}', 'ControlPanelController@statistics')
                    ->name('statistics');
                Route::post('clearLog/{application}', 'ControlPanelController@clearLog')
                    ->name('clearLog');
                Route::post('maintenance/{application}', 'ControlPanelController@maintenance')
                    ->name('maintenance');
            });

        Route::prefix('administration')->as('administration.')
            ->group(function () {
                Route::prefix('applications')->as('applications.')
                    ->group(function () {
                        Route::get('initTable', 'ApplicationTableController@init')
                            ->name('initTable');
                        Route::get('getTableData', 'ApplicationTableController@data')
                            ->name('getTableData');
                        Route::get('exportExcel', 'ApplicationTableController@excel')
                            ->name('exportExcel');
                    });

                Route::resource('applications', 'ApplicationController', ['except' => ['show']]);
            });
    });
