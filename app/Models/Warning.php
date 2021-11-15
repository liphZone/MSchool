<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'nom',
        'prenom',
        'classe',
        'professeur',
        'matiere',
        'date',
        'motif',
        'type',
        'annee_scolaire',
    ];
}
