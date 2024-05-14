@extends('layouts.app')

@section('title', 'Gestion des Formations')

@section('content')
<link rel="stylesheet" href="{{ asset('css/gestion_formation.css') }}">
    <div class="container">
        <h1 style="text-align:center;">Gestion des Formations</h1>
        <div class="diverror">
            @if(session('success'))
            <div class="alert alert-danger">
                {{ session('success') }}
            </div>
            @endif
        </div>
        
        <!-- Bouton pour créer une nouvelle formation -->
        <a href="{{ route('formations.create') }}" class="cree_formation">Créer une nouvelle formation</a>
        
        <!-- Liste des formations -->
        <ul class="list-group">
            @foreach($formations as $formation)
                <li class="list-group-item">
                    <h2>{{ $formation->titre }}</h2>
                    <p>{{ $formation->description }}</p>
                    <p>Durée : {{ $formation->duree }}</p>
               <a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
