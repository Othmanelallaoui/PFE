@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/conge.css">

<style>
    body {
        display: flex;
        flex-direction: column;
    }

    .add_offre {

        float: right;
        margin-top: 20px;
        margin-right: 20px;
    }

    .add_offre a {
        background-color: black;
        padding: 8px 10px;
        border-radius: 6px;
        color: white;
    }

    .table {
        width: 90%;
        margin-bottom: 50px;
        margin-left: 80px;
        margin-top: 20px;
        background-color: white;
        border-radius:8px ;


    }

    .table th,
    .table td {
        padding: 8px;

 
    }
    .table td {
        
        border-bottom: #bbb 1px solid;
        font-size: 13.5px;

    }
    .table th {
        background-color: #f2f2f2;
        font-size: 14px;
    }

    .divtab {
        display: flex;
        justify-content: center;
        text-align: center;
        width: 100%;
        border-radius: 8px;
    }

    .bar {
        width: 100%;
        height: 70px;
    }

    table tbody tr:hover {
        cursor: pointer;
        background-color: rgba(10, 10, 10, 0.111);
    }
    .genererexcel{
        float: right;
            padding: 6px 8px;
            border-radius: 8px;
            font-size: 12px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            margin: 5px 10px;
            background-color: #4CAF50;
            color: white;
    }
</style>


<div class="bar">
    <div class="add_offre">
        <nav>
            <a href="{{ route('add_offer') }}"><i class="fas fa-plus"> </i> Ajouter une offre </a>
        </nav>
    </div>
</div>


<div class="divtab">
    <table class="table">
        <thead>
            <tr>
                <th >Titre du poste</th>
                <th  >Description</th>
                <th >Type de contrat</th>
                <th >Formation</th>
                <th >Candidats</th> <!-- Nouvelle colonne -->
                <th >EXCEL</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($offers as $offer)
<tr class="table-row" data-url="{{ route('affiche_condidat', ['id' => $offer->id]) }}">
    <td>{{ $offer->titre_poste }}</td>
    <td>{{ $offer->description_poste }}</td>
    <td>{{ $offer->type_contrat }}</td>
    <td>{{ $offer->formation_requise }}</td>
    <td>
        <a href="{{ route('affiche_condidat', ['id' => $offer->id]) }}" class="candidats-interesses">
            <i class="fas fa-user"></i> <!-- Icône de candidat -->
            <span>{{ $offer->candidats_interesses_count }}</span> <!-- Nombre de candidats intéressés -->
        </a>
    </td>
    <td>
    <a href="{{ route('export.candidats_interesses', ['id' => $offer->id]) }}" class="genererexcel">
    Excel
</a>

    </td>
</tr>
@endforeach

        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tableRows = document.querySelectorAll('.table-row');
        tableRows.forEach(row => {
            row.addEventListener('click', function() {
                const url = this.getAttribute('data-url');
                window.location.href = url;
            });
        });
    });
</script>

@endsection
