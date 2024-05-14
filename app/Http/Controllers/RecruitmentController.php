<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruitment;
use App\Models\DemandeRecrutment;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CandidatsInteressesExport;



use function PHPUnit\Framework\returnSelf;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Récupérer toutes les offres
        $offers = Recruitment::all();

        // Compter le nombre de candidats intéressés pour chaque offre
        foreach ($offers as $offer) {
            $offer->candidats_interesses_count = DemandeRecrutment::where('offre_id', $offer->id)->count();
        }

        // Passer les offres à la vue gestion_recritment
        return view('Recruitment.gestion_recruitment', ['offers' => $offers]);
    }



    public function offre_emploi()
    {
        $offers = Recruitment::all();

        // Passer les offres à la vue gestion_recritment
        return view('Recruitment.offre_emploi', ['offers' => $offers]);
    }

    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'titre_poste' => 'required|string',
            'description_poste' => 'required|string',
            'date_publication' => 'required|date',
            'date_cloture' => 'required|date',
            'type_contrat' => 'required|string',
            'salaire_propose' => 'nullable|numeric',
            'formation_requise' => 'required|string',
            'experience_requise' => 'required|string',
            'langues_requises' => 'required|string',
        ]);

        // Création d'une nouvelle instance de modèle Recruitment
        $recruitment = new Recruitment();

        // Assignation des données du formulaire au modèle
        $recruitment->titre_poste = $request->titre_poste;
        $recruitment->description_poste = $request->description_poste;
        $recruitment->date_publication = $request->date_publication;
        $recruitment->date_cloture = $request->date_cloture;
        $recruitment->type_contrat = $request->type_contrat;
        $recruitment->salaire_propose = $request->salaire_propose;
        $recruitment->formation_requise = $request->formation_requise;
        $recruitment->experience_requise = $request->experience_requise;
        $recruitment->langues_requises = $request->langues_requises;

        // Enregistrement du modèle dans la base de données
        $recruitment->save();

        // Redirection avec un message de succès
        return redirect()->route('recruitment.index')->with('success', 'L\'offre d\'emploi a été créée avec succès.');
    }




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

    public function add_offer()
    {
        return view('recruitment.add_offer_emploi');
    }

    public function afficheCondidat($id)
    {
        // Récupérer les candidats liés à l'offre spécifiée
        $condidats = DemandeRecrutment::where('offre_id', $id)->get();

        // Vérifier l'existence du fichier CV pour chaque candidat
        foreach ($condidats as $condidat) {
            // Obtenir le chemin complet du fichier CV
            $filePath = Storage::path($condidat->resume);

            // Vérifier si le fichier existe réellement
            if (file_exists($filePath)) {
                $condidat->cvExists = true;
            } else {
                $condidat->cvExists = false;
            }
        }

        // Passer les candidats récupérés à la vue
        return view('recruitment.list_condidats_offre', ['condidats' => $condidats]);
    }

    public function afficherOfferForm($id)
    {
        $offer = Recruitment::find($id);
        return view('recruitment.formulair_condidat', compact('offer'));
    }
    public function detailsOffer($id)
    {
        $offer = Recruitment::find($id); // Supposons que votre modèle s'appelle "Offer"
        return view('recruitment.details_offre', compact('offer'));
    }
    public function exportCandidatsInteresses($id)
    {
        // Récupérer les candidats intéressés à l'offre spécifiée
        $condidats = DemandeRecrutment::where('offre_id', $id)->get();

        // Vérifier si des candidats sont disponibles
        if ($condidats->isEmpty()) {
            return redirect()->back()->with('error', 'Aucun candidat n\'est disponible pour cette offre.');
        }

        // Générer le fichier Excel avec les données des candidats
        return Excel::download(new CandidatsInteressesExport($id), 'candidats_interesses_offre_' . $id . '.xlsx');
    }
}
