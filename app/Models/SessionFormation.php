<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionFormation extends Model
{
    protected $fillable = [
        'formation_id', 'date_debut', 'date_fin', 'lieu',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
