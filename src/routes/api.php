<?php

Route::namespace('LaravelEnso\ControlPanel\app\Http\Controllers')
    ->middleware(['web', 'auth', 'core'])
    ->prefix('api')
    ->group(function () {
        Route::namespace('ControlPanel')
            ->prefix('controlPanel')
            ->as('controlPanel.')
            ->group(function () {
                Route::post('statistics/{application}', 'Statistics')->name('statistics');
                Route::post('clearLog/{application}', 'ClearLog')->name('clearLog');
                Route::post('maintenance/{application}', 'Maintenance')->name('maintenance');
            });

        Route::prefix('administration')
            ->as('administration.')
            ->group(function () {
                Route::namespace('Application')
                    ->prefix('applications')
                    ->as('applications.')
                    ->group(function () {
                        Route::get('', 'Index')->name('index');
                        Route::get('create', 'Create')->name('create');
                        Route::post('', 'Store')->name('store');
                        Route::get('{application}/edit', 'Edit')->name('edit');
                        Route::patch('{application}', 'Update')->name('update');
                        Route::delete('{application}', 'Destroy')->name('destroy');

                        Route::get('initTable', 'InitTable')->name('initTable');
                        Route::get('tableData', 'TableData')->name('tableData');
                        Route::get('exportExcel', 'ExportExcel')->name('exportExcel');
                    });
            });
    });
