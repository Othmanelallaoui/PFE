<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Formation;
use App\Models\Formateur;

class FormationSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 40) as $index) {
            // Générer une durée aléatoire en mois
            $duree = $faker->numberBetween(1, 12);

            // Récupérer l'ID d'un formateur aléatoire
            $formateur = Formateur::inRandomOrder()->first();

            // Vérifier si un formateur a été récupéré
            if ($formateur) {
                $formateurId = $formateur->id;

                // Générer les dates de début et de fin
                $dateDebut = $faker->dateTimeBetween('-1 year', 'now');
                $dateFin = $faker->dateTimeBetween($dateDebut, '+1 year');

                // Créer la formation avec l'ID du formateur
                Formation::create([
                    'titre' => $faker->sentence,
                    'description' => $faker->paragraph,
                    'duree' => $duree,
                    'date_debut' => $dateDebut,
                    'date_fin' => $dateFin,
                    'formateur_id' => $formateurId,
                ]);
            }
        }
    }
}
