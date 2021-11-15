<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable =[
        'matricule','nom',
        'prenom','date_naissance',
        'lieu_naissance','age',
        'sexe','adresse',
        'contact','email','provenance',
        'etat','profil',
        'annee_scolaire','niveau','type_parent',
        'nom_parent','sexe_parent',
        'profession_parent','adresse_parent',
        'email_parent','contact_parent','nom_parent_secondaire',
        'profession_parent_secondaire','contact_parent_secondaire',
        'autre_parent','profession_autre_parent',
        'contact_autre_parent','montant',
        'date','classe',
         ];
}
