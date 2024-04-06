<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeFormation extends Model
{
    protected $fillable = [
        'employe_id', 'session_formation_id',
    ];

    public function sessionFormation()
    {
        return $this->belongsTo(SessionFormation::class);
    }

    public function employe()
    {
        return $this->belongsTo(Employee::class);
    }
}
