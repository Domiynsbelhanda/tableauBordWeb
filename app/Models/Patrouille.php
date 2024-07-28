<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrouille extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'chef_patrouille_id', 'matricule', 'password', 'plaque_vehicule', 'latitude', 'longitude'
    ];

    public function chefPatrouille()
    {
        return $this->belongsTo(Militaire::class, 'chef_patrouille_id');
    }
}
