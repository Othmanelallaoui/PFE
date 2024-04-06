@extends('layouts.app')

@section('title', 'Créer une nouvelle formation')

@section('content')
<link rel="stylesheet" href="{{ asset('css/create_formation.css') }}">
<link rel="stylesheet" href="{{asset('css/sidebare.css')}}">
<link rel="stylesheet" href="{{asset('css/footer.css')}}">

<style>
    button[type="submit"] {
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.9);
    }

    button[type="submit"]:hover {
        background-color: blue;
    }
</style>

<div class="container">
    <form action="{{ route('formations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="formateur">Formateur :</label>
            <select name="formateur" id="formateur" class="form-control" required>
                <option value="">Sélectionner un formateur</option>
                @foreach($formateurs as $formateur)
                <option value="{{ $formateur->id }}">{{ $formateur->nom }} {{ $formateur->prenom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" class="form-control" rows="2" required></textarea>
        </div>
        <div class="form-group">
            <label for="duree">Durée :</label>
            <input type="text" name="duree" id="duree" class="form-control" required>
        </div>
        <div class="form-group">
    <label for="date_debut">Date de début :</label>
    <input type="date" name="date_debut" id="date_debut" class="form-control" required>
</div>
<div class="form-group">
    <label for="date_fin">Date de fin :</label>
    <input type="date" name="date_fin" id="date_fin" class="form-control" required>
</div>

        <button type="submit" class="btn-cree">Créer</button>
    </form>
</div>
@endsection