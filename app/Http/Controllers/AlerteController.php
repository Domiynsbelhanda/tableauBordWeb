<?php

namespace App\Http\Controllers;

use App\Models\Alerte;
use App\Models\User;
use App\Notifications\AlerteReceived;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
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

    public function checkPatrouille(Request $request)
    {
        $validatedData = $request->validate([
            'matricule' => 'required|string',
            'password' => 'required|string'
        ]);

        $patrouille = \App\Models\Patrouille::where('matricule', $validatedData['matricule'])
            ->where('password', $validatedData['password'])
            ->first();

        if (!$patrouille) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $alertes = $patrouille->alertes; // Assurez-vous que la relation 'alertes' est définie dans le modèle Patrouille

        return response()->json([
            'patrouille' => $patrouille,
            'alertes' => $alertes
        ]);
    }
}
