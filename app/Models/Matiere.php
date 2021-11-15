<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable =
    [
        'code',
        'libelle',
        'coefficient',
        'type_matiere',
        'classe',
        'professeur',
        'type',
        'type_professeur',
        'nbre_interro',
        'nbre_devoir',
    ];
}
