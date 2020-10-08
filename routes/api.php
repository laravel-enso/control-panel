<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api')
    ->group(function () {
        require 'app/controlPanel.php';
        require 'app/applications.php';
    });
