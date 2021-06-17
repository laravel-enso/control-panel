<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api')
    ->group(function () {
        require __DIR__.'/app/controlPanel.php';
        require __DIR__.'/app/applications.php';
    });
