<?php

use App\Http\Controllers\AlerteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

Route::post('api/alertes', [AlerteController::class, 'store']);

Route::post('/patrouille/login', [AlerteController::class, 'checkPatrouille']);

