<?php

use App\Http\Controllers\AlerteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('api/alertes', [AlerteController::class, 'store']);

