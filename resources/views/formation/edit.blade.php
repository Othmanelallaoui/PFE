@extends('layouts.app')

@section('title', 'Modifier la formation')

@section('content')
<link rel="stylesheet" href="{{ asset('css/create_formation.css') }}"> <!-- Assuming same styling as create -->
<link rel="stylesheet" href="{{asset('css/sidebare.css')}}">
<link rel="stylesheet" href="{{asset('css/footer.css')}}">


<div class="container">
    <h1>Modifier la Formation</h1>
    <form action="{{ route('formations.update', $formation->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Specifying the HTTP method to be PUT for update -->

        <div class="form-group">
            <label for="formateur">Formateur :</label>
            <select name="formateur" id="formateur" class="form-control" required>
                <option value="">Sélectionner un formateur</option>
                @foreach($formateurs as $formateur)
                    <option value="{{ $formateur->id }}" {{ $formation->formateur_id == $formateur->id ? 'selected' : '' }}>
                        {{ $formateur->nom }} {{ $formateur->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" class="form-control" required value="{{ $formation->titre }}">
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ $formation->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="duree">Durée :</label>
            <input type="text" name="duree" id="duree" class="form-control" required value="{{ $formation->duree }}">
        </div>
        <div class="form-group">
            <label for="date_debut">Date de début :</label>
            <input type="date" name="date_debut" id="date_debut" class="form-control" required value="{{ $formation->date_debut->format('Y-m-d') }}">
        </div>
        <div class="form-group">
            <label for="date_fin">Date de fin :</label>
            <input type="date" name="date_fin" id="date_fin" class="form-control" required value="{{ $formation->date_fin->format('Y-m-d') }}">
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
