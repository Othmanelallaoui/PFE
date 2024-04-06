<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeRecrutment extends Model
{
    use HasFactory;
    protected $fillable = [
        'offre_id',
        'id_condidat',
        'first_name',
        'last_name',
        'email',
        'phone',
        'resume',
        'message'
    ];

    // Définition de la relation avec le modèle "Recruitment"
    public function recruitment()
    {
        return $this->belongsTo(Recruitment::class);
    }
}
