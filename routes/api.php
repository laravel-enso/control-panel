<?php

use Illuminate\Support\Facades\Route;

Route::namespace('LaravelEnso\ControlPanel\Http\Controllers')
    ->middleware(['api', 'auth', 'core'])
    ->prefix('api')
    ->group(function () {
        require 'app/controlPanel.php';
        require 'app/applications.php';
    });
