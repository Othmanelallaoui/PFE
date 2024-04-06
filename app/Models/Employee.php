<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'employee';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'sexe',
        'date_of_birth',
        'email',
        'role',
        'password',
        'city',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
