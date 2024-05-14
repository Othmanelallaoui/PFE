<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use App\Models\Employee;
use Carbon\Carbon;


class AbsenceController extends Controller
{
    
    public function index()
    {
        $absences = Absence::all();
    
        // Obtenez tous les employés associés aux absences
        $employees = Employee::whereIn('id', $absences->pluck('employee_id'))->get();
    
        return view('absences.gestion_absences')->with([
            'absences' => $absences,
            'employees' => $employees,
        ]);
    }
    

    
    public function create()
    {
        
    }

    

public function store(Request $request)
{
    // Validation des données du formulaire
    $request->validate([
        'employee_id' => 'exists:employees,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'absence_type' => 'required',
        'duration' => 'required|numeric',
        'reason' => 'required',
        'comments' => 'nullable',
        'document_path' => 'nullable',
    ]);

    // Vérification si l'employé a déjà une absence pour cette période
    $employeeId = $request->input('employee_id');
    $startDate = Carbon::parse($request->input('start_date'));
    $endDate = Carbon::parse($request->input('end_date'));

    $existingAbsence = Absence::where('employee_id', $employeeId)
        ->where(function ($query) use ($startDate, $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate])
                ->orWhereBetween('end_date', [$startDate, $endDate]);
        })
        ->first();

    if ($existingAbsence) {
        // L'employé a déjà une absence pour cette période
        return redirect()->route('absences.index')->with('error', 'Cet employé a déjà une absence pour cette période.');
    }

    // Créer une nouvelle instance d'absence
    $absence = new Absence;

    // Assigner les données du formulaire à l'instance d'absence
    $absence->employee_id = $request->input('employee_id');
    $absence->admin_id = auth()->id();
    $absence->start_date = $request->input('start_date');
    $absence->end_date = $request->input('end_date');
    $absence->absence_type = $request->input('absence_type');
    $absence->duration = $request->input('duration');
    $absence->reason = $request->input('reason');
    $absence->comments = $request->input('comments');
    $absence->document_path = $request->input('document_path');

    // Enregistrement dans la base de données
    $absence->save();

    // Redirection avec un message de réussite
    return redirect()->route('absences.index')->with('success', 'Absence enregistrée avec succès.');
}


    
    public function show(string $id)
    {
    }

   
    public function edit(string $id)
    {
       
    }

   
    public function update(Request $request, string $id)
    {
        
    }

   
    public function destroy(string $id)
    {
        
    }
    public function add_absence(){
        $employee= Employee::all();
        return view('absences.add_absence')->with('employees', $employee);
    }
}
