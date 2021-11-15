<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'type',
        'duree',
        'date',
        'professeur',
        'matiere',
        'note',
        'classe',
        'annee_scolaire',
    ];
}
