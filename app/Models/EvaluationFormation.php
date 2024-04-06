<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationFormation extends Model
{
    protected $fillable = [
        'session_formation_id', 'note', 'commentaire',
    ];

    public function sessionFormation()
    {
        return $this->belongsTo(SessionFormation::class);
    }
}
