<?php

use App\Http\Controllers\AlerteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

Route::post('api/alertes', [AlerteController::class, 'store']);
// Dans routes/api.php

Route::post('api/patrouille/login', [AlerteController::class, 'checkPatrouille']);


