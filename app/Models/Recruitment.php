<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{   use HasFactory;
    protected $fillable = [
        'titre_poste',
        'description_poste',
        'date_publication',
        'date_cloture',
        'type_contrat',
        'salaire_propose',
        'formation_requise',
        'experience_requise',
        'langues_requises',
    ];
}
