<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerte extends Model
{
    use HasFactory;

    protected $fillable = ['pseudo', 'telephone', 'latitude', 'longitude', 'status', 'patrouille_id'];

    public function patrouille()
    {
        return $this->belongsTo(Patrouille::class);
    }
}
