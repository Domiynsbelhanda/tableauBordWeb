<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Militaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'matricule',
        'grade',
        'description',
        'patrouille_id'
    ];


    public function patrouille()
    {
        return $this->belongsTo(Patrouille::class, 'patrouille_id');
    }
}
