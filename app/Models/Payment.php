<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'nom',
        'prenom',
        'niveau',
        'classe',
        'annee_scolaire',
        'scolarite',
        'montant_paye',
        'montant_restant',
        'date',
        'utilisateur',
    ];

}
