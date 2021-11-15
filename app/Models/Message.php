<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'emetteur',
        'recepteur',
        'sujet',
        'contenu',
        'utilisateur',
        'commentaire',
        'type_message',
        'date',
        'etat',
        'annee_scolaire',];
}
