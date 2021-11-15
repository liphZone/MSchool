<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $fillable = 
    [
        'classe',
        'numero',
        'libelle',
        'annee_scolaire',
    ];
}
