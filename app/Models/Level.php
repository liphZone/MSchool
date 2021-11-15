<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable =
    [
        'libelle',
        'nombre_classe',
        'periode',
        'montant',
        'annee_scolaire',
        'utilisateur',
    ];
}
