<?php

Route::namespace('LaravelEnso\ControlPanel\app\Http\Controllers')
    ->middleware(['web', 'auth', 'core'])
    ->prefix('api')
    ->group(function () {
        require 'app/controlPanel.php';
        require 'app/applications.php';
    });
