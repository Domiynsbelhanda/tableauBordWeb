<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AlerteReceived extends Notification
{
    use Queueable;

    public $alerte;

    public function __construct($alerte)
    {
        $this->alerte = $alerte;
    }

    public function via($notifiable): array
    {
        return ['database', 'broadcast']; // Notification via base de données et broadcast
    }

    public function toArray($notifiable): array
    {
        return [
            'id' => $this->alerte->id,
            'message' => 'New alerte received: ' . $this->alerte->pseudo,
            'url' => url('/alertes/' . $this->alerte->id) // Lien vers la page de détails de l'alerte
        ];
    }
}
