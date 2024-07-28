<?php

namespace App\Http\Controllers;

use App\Models\Alerte;
use App\Models\User;
use App\Notifications\AlerteReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AlerteController extends Controller
{
    public function store(Request $request)
    {
        $alerte = Alerte::create($request->all());

        // Envoyer la notification à tous les utilisateurs
        $users = User::all();
        Notification::send($users, new AlerteReceived($alerte));

        return response()->json($alerte, 201);
    }
}
