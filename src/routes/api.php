<?php

use Illuminate\Support\Facades\Route;

Route::namespace('LaravelEnso\ControlPanel\App\Http\Controllers')
    ->middleware(['web', 'auth', 'core'])
    ->prefix('api')
    ->group(function () {
        require 'app/controlPanel.php';
        require 'app/applications.php';
    });
