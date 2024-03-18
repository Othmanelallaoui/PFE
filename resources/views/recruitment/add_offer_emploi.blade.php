@extends('layouts.app')
@section('title','Nouvelle Offer')
@section('content')

<style>
    .divForm {
        display: flex;
        justify-content: center;
        text-align: left;
        padding: 30px;

    }

   .divForm form {
        padding: 10px;
        width: 500px;
        border: 1px solid black ;
        box-shadow: 10px 1px 100px 0px rgba(0, 0, 0, 0.5);

    }



    #type_contrat {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Styles optionnels pour améliorer l'apparence */
    .form-group label {
        display: flex;
        margin-bottom: 5px;
        /* Réduire l'espace entre les labels */
    }

    .form-group input[type="text"],
    .form-group input[type="date"],
    .form-group input[type="number"],
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;        
        margin-bottom: 5px;
    }

    /* Styles pour le bouton de soumission */
    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 8px 15px;
        /* Réduire la taille du bouton */
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }
</style>






<div class="divForm">
    <form method="POST" action="{{ route('recruitment.store') }}">
        @csrf

        <div class="form-group">
            <label for="titre_poste">Titre du poste</label>
            <input type="text" name="titre_poste" class="form-control" id="titre_poste" required>
        </div>

        <div class="form-group">
            <label for="description_poste">Description du poste</label>
            <textarea name="description_poste" class="form-control" id="description_poste" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="date_publication">Date de publication</label>
            <input type="date" name="date_publication" class="form-control" id="date_publication" required>
        </div>

        <div class="form-group">
            <label for="date_cloture">Date de clôture</label>
            <input type="date" name="date_cloture" class="form-control" id="date_cloture" required>
        </div>

        <div class="form-group">
            <label for="type_contrat">Type de contrat</label>
            <select name="type_contrat" class="form-control" id="type_contrat" required>
                <option value="CDI">CDI (Contrat à durée indéterminée)</option>
                <option value="CDD">CDD (Contrat à durée déterminée)</option>
                <option value="Stage">Stage</option>
                <option value="Apprentissage">Apprentissage</option>
                <option value="Intérim">Intérim</option>
                <option value="Freelance">Freelance</option>
                <option value="Temps partiel">Temps partiel</option>
            </select>
        </div>

        <div class="form-group">
            <label for="salaire_propose">Salaire proposé</label>
            <input type="number" name="salaire_propose" class="form-control" id="salaire_propose" step="0.01">
        </div>

        <div class="form-group">
            <label for="formation_requise">Formation requise</label>
            <textarea name="formation_requise" class="form-control" id="formation_requise" rows="2" required></textarea>
        </div>

        <div class="form-group">
            <label for="experience_requise">Expérience requise</label>
            <input type="text" name="experience_requise" class="form-control" id="experience_requise" required>
        </div>

        <div class="form-group">
            <label for="langues_requises">Langues requises</label>
            <textarea name="langues_requises" class="form-control" id="langues_requises" rows="2" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

</div>
@endsection