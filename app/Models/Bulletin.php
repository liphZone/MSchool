<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected $fillable =
    [
        'periode',
        'term',
        'nom',
        'prenom',
        'classe',
        'niveau',
        'moyenne',
        'rang',
        'date',
        'utilisateur',
        'annee_scolaire',
    ];
}
