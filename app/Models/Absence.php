<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $table = 'absences';

    protected $fillable = [
        'employee_id',
        'admin_id',
        'start_date',
        'end_date',
        'absence_type',
        'duration',
        'reason',
        'comments',
        'document_path',
    ];
}
