@extends('layouts.app')
@section('title','Nouvelle Offre')
@section('content')

<style>
    .divForm {
        display: flex;
        justify-content: center;
        text-align: left;
        padding: 30px;

    }

   .divForm form {
        padding: 12px;
        width: 500px;
        border: 1px solid black ;
        box-shadow: 10px 1px 100px 0px rgba(0, 0, 0, 0.5);
        border-radius: 10px;


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
        padding: 10px;
        border: 0.5px solid #ccc;
        border-radius: 6px;        
        margin-bottom: 8px;
    }

    /* Styles pour le bouton de soumission */
    button[type="submit"] {
        background-color: black;
        color: #fff;
        border: none;
        padding: 8px 15px;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }
</style>






<div class="divForm">
    <form method="POST" action="{{ route('recruitment.store') }}">
        @csrf
        <div class="form-group">
    <input type="text" name="titre_poste" class="form-control" placeholder="Titre du poste" id="titre_poste" required>
</div>

<div class="form-group">
    <textarea name="description_poste" class="form-control" placeholder="Description du poste" id="description_poste" rows="2" required></textarea>
</div>

<div class="form-group">
    <input type="date" name="date_publication" class="form-control" placeholder="Date de publication" id="date_publication" required>
</div>

<div class="form-group">
    <input type="date" name="date_cloture" class="form-control" placeholder="Date de clôture" id="date_cloture" required>
</div>

<div class="form-group">
    <select name="type_contrat" class="form-control" id="type_contrat" required>
        <option value="" disabled selected hidden>Type de contrat</option>
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
    <input type="number" name="salaire_propose" class="form-control" placeholder="Salaire proposé" id="salaire_propose" step="0.01">
</div>

<div class="form-group">
    <textarea name="formation_requise" class="form-control" placeholder="Formation requise" id="formation_requise" rows="2" required></textarea>
</div>

<div class="form-group">
    <input type="text" name="experience_requise" class="form-control" placeholder="Expérience requise" id="experience_requise" required>
</div>

<div class="form-group">
    <textarea name="langues_requises" class="form-control" placeholder="Langues requises" id="langues_requises" rows="2" required></textarea>
</div>


        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

</div>
@endsection
