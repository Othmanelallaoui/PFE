<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conge;
use App\Models\DemandConge;

class CongeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conges = Conge::all();


        return view('conge.gestion_conge', ['conges' => $conges]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conge.demande_conge');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'motif' => 'required|string',
            'employee_id'=>'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'commentaire' => 'nullable|string',
        ]);

        // Création d'une nouvelle demande de congé associée à l'utilisateur authentifié
        $demandConge = new DemandConge();
        $demandConge->employee_id = $validatedData['employee_id'];
        $demandConge->motif = $validatedData['motif'];
        $demandConge->date_debut = $validatedData['date_debut'];
        $demandConge->date_fin = $validatedData['date_fin'];
        $demandConge->commentaire = $validatedData['commentaire'];

        // Enregistrement de la demande de congé
        $demandConge->save();

        // Redirection vers une page de confirmation ou une autre action
        return redirect()->route('conge.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
