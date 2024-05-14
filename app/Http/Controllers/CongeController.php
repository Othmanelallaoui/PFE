<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandConge;
use Illuminate\Support\Facades\Auth;

class CongeController extends Controller
{
    // Méthode pour afficher toutes les demandes de congé (index)
    public function index()
    {
        // Charger la relation employee avec chaque demande de congé
        $conges = DemandConge::with('employee')->get();
        return view('conge.gestion_conge', ['conges' => $conges]);
    }

    // Méthode pour afficher le formulaire de demande de congé et les demandes existantes pour l'employé connecté
    public function create()
    {
        $user = Auth::guard('employee')->user();
        $conges = DemandConge::where('employee_id', $user->id)->get();
        return view('conge.demande_conge', compact('conges'));
    }

    // Méthode pour enregistrer une nouvelle demande de congé
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'motif' => 'required|string',
            'employee_id' => 'required|exists:employees,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'commentaire' => 'nullable|string',
        ]);

        $demandConge = new DemandConge();
        $demandConge->employee_id = $validatedData['employee_id'];
        $demandConge->motif = $validatedData['motif'];
        $demandConge->date_debut = $validatedData['date_debut'];
        $demandConge->date_fin = $validatedData['date_fin'];
        $demandConge->commentaire = $validatedData['commentaire'];
        $demandConge->save();

        return redirect()->route('demande_conge');
    }

    // Méthode pour approuver une demande de congé
    public function approve($id)
    {
        $conge = DemandConge::find($id);

        if (!$conge) {
            return redirect()->route('conges.index')->with('error', 'Demande de congé non trouvée.');
        }

        $conge->statu = 'approuvée';
        $conge->save();

        return redirect()->route('conges.index')->with('success', 'Demande de congé approuvée avec succès.');
    }

    // Méthode pour annuler une demande de congé
    public function cancel($id)
    {
        $conge = DemandConge::find($id);

        if (!$conge) {
            return redirect()->route('conges.index')->with('error', 'Demande de congé non trouvée.');
        }

        $conge->statu = 'refuser';
        $conge->save();

        return redirect()->route('conges.index')->with('success', 'Demande de congé annulée avec succès.');
    }
}
