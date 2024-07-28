<?php

namespace App\Livewire;

use Livewire\Component;

class NotificationsList extends Component
{
    public function render()
    {
        $notifications = auth()->user()->notifications; // Obtenez les notifications de l'utilisateur
        return view('livewire.notifications-list', compact('notifications'));
    }
}
