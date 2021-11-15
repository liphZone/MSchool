<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $fillable =
    [
        'type',
        'libelle',
        'materiel',
        'quantite',
        'prixunitaire',
        'montant',
        'date',
        'utilisateur',
        'annee_scolaire',
    ];
}
