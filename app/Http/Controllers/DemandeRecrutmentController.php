<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeRecrutment;
use App\Http\Controllers\RecruitmentController;
use App\Models\Recruitment;


class DemandeRecrutmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'offer_id' => 'required|exists:recruitments,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'id_condidat'=>'required|exists:employees,id',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'message' => 'nullable|string|max:1000',
        ]);

        // Création d'une nouvelle instance de DemandeRecrutment
        $demandeRecrutment = new DemandeRecrutment;

        // Affectation des valeurs du formulaire à l'instance DemandeRecrutment
        $demandeRecrutment->offre_id = $validatedData['offer_id'];
        $demandeRecrutment->id_condidat = $validatedData['id_condidat'];
        $demandeRecrutment->first_name = $validatedData['first_name'];
        $demandeRecrutment->last_name = $validatedData['last_name'];
        $demandeRecrutment->email = $validatedData['email'];
        $demandeRecrutment->phone = $validatedData['phone'];
        $demandeRecrutment->message = $validatedData['message'];

        // Gestion du téléchargement du fichier CV
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumePath = $resume->store('resumes'); // Stocker le fichier dans le dossier "resumes" du stockage Laravel
            $demandeRecrutment->resume = $resumePath;
        }

        // Enregistrement de l'instance dans la base de données
        $demandeRecrutment->save();


        $offer = Recruitment::find( $validatedData['offer_id']);    
        return redirect()->route('Offre_details', ['id' => $offer->id]);

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
