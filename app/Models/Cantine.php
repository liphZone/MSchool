<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cantine extends Model
{
    protected $fillable =
    [
        'eleve',
        'classe',
        'niveau',
        'type',
        'date',
        'montant',
        'annee_scolaire',
    ];
}
