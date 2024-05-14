@extends('layouts.app')

@section('title', 'Liste des Candidats')

@section('content')
<style>
    .profile {
        width: 90%;
        background-color: rgba(0, 0, 0, 0.8);
        color: #fff;
        margin-left: 100px;
        margin-bottom: 50px;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .profile h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .profile p {
        margin-bottom: 5px;
    }

    .profile a {
        color: red;
        text-decoration: none;
    }

    .profile a:hover {
        text-decoration: underline;
    }

    .profiles {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    h1 {
        font-size: 30px;
        text-align: center;
        margin: 20px;
        margin-left: 110px;
    }

    .vide {
        display: flex;
        text-align: center;
        justify-content: center;
        color: black;
        padding: 30px;
        margin-left: 80px;
        margin-top: 200px;
    }
</style>
<link rel="stylesheet" href="{{ asset('style1.css') }}">
<h1>Liste des Candidats de l'Offre </h1>

@if($condidats->isNotEmpty())
<div class="profiles">
    @foreach ($condidats as $condidat)
    <div class="profile">
        <h2>{{ $condidat->first_name }} {{ $condidat->last_name }}</h2>
        <p>Email: {{ $condidat->email }}</p>
        <p>Téléphone: {{ $condidat->phone }}</p>
        <p>CV: <a href="{{ asset($condidat->resume) }}" download>Télécharger CV</a></p>
        <p>Message: Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, reiciendis mollitia quisquam, error placeat temporibus iusto suscipit dolores facere officia est nostrum distinctio nisi illo nulla iste? Sapiente, vitae laudantium?</p>
    </div>
    @endforeach
</div>
@else
<p class="vide">Aucun candidat n'est disponible pour cette offre.</p>
@endif
<script src="{{ asset('sidebarjs.js') }}"></script>
@endsection
