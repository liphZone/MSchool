<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'montant',
        'date',
        'type',
        'etat',
        'utilisateur',
        'annee_scolaire',
        'status'
    ];
}
