<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Formateur;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::all();

        return view('formation.gestion_formation', compact('formations'));
        

    }

    public function create()
    {
        $formateurs = Formateur::all();

        return view('formation.create',compact('formateurs'));
    }
  
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'duree' => 'required|string',
            'formateur' => 'required|exists:formateurs,id', // Assurez-vous que l'ID du formateur existe dans la table des formateurs
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut', // La date de fin doit être postérieure ou égale à la date de début
        ]);
    
        // Créer une nouvelle formation avec les données validées
        $formation = new Formation();
        $formation->titre = $request->titre;
        $formation->description = $request->description;
        $formation->duree = $request->duree;
        $formation->formateur_id = $request->formateur; // Assurez-vous que le nom de la colonne correspond à votre modèle Formation
        $formation->date_debut = $request->date_debut;
        $formation->date_fin = $request->date_fin;
        $formation->save();
    
        // Rediriger l'utilisateur avec un message de succès
        return redirect()->route('formation.index')->with('success', 'La formation a été créée avec succès.');
    }
    

  
    public function show(string $id)
    {
        
    }

   
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
