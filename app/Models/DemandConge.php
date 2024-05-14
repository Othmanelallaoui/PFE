<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandConge extends Model
{
    use HasFactory;

    protected $table = 'demand_conge'; 

    protected $fillable = [
        'employee_id',
        'motif',
        'date_debut',
        'date_fin',
        'commentaire',
        'statu', // Ajoutez ceci
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    // Relation avec l'utilisateur qui a fait la demande de congé (si applicable)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
