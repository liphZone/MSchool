<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moyenne extends Model
{
    protected $fillable =
    [
        'periode',
        'term',
        'nom',
        'prenom',
        'classe',
        'professeur',
        'matiere',
        'type_matiere',
        'interrogation',
        'devoir',
        'examen',
        'coefficient',
        'avg_matiere',
        'avg_matiere_coef',
        'appreciation',
        'date',
        'utilisateur',
        'annee_scolaire',
    ];
}
