<?php

namespace App\Exports;

use App\Models\DemandeRecrutment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CandidatsInteressesExport implements FromCollection, WithHeadings
{
    private $offre_id;

    /**
     * Constructeur de la classe.
     *
     * @param int $offre_id L'ID de l'offre spécifiée
     */
    public function __construct($offre_id)
    {
        $this->offre_id = $offre_id;
    }

    /**
     * Récupérer les données pour l'exportation.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Récupérer les données des candidats intéressés à l'offre spécifiée avec le nom de l'offre
        $condidats = DemandeRecrutment::join('recruitments', 'demande_recrutments.offre_id', '=', 'recruitments.id')
                        ->select('demande_recrutments.*', 'recruitments.titre_poste as offre')
                        ->where('demande_recrutments.offre_id', $this->offre_id)
                        ->get();
    
        // Formater les données pour l'exportation
        $data = [];
        foreach ($condidats as $condidat) {
            $data[] = [
                'Prénom' => $condidat->first_name,
                'Nom' => $condidat->last_name,
                'Email' => $condidat->email,
                'Téléphone' => $condidat->phone,
            ];
        }
    
        return collect($data);
    }
    
    /**
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Prénom',
            'Nom',
            'Email',
            'Téléphone',
        ];
    }
}

