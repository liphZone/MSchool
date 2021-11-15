<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable = [
        'nom_directeur',
        'nom_ecole',
        'adresse_ecole',
        'image_ecole',
    ];
}
