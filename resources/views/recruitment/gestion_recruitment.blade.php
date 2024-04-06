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
        width: 80%;
        border-collapse: collapse;
        margin-bottom: 50px;
        margin-left: 60px;
    }

    .table th,
    .table td {
        padding: 8px;
        border: 1px solid black;
    }
    
    .table th {
        background-color: rgba(10, 10, 10, 0.2);
    }

    .divtab {
        display: flex;
        justify-content: center;
        text-align: center;
        width: 100%;
    }

    .bar {
        width: 100%;
        height: 70px;
    }

    table tbody tr:hover {
        cursor: pointer;
        background-color: rgba(10, 10, 10, 0.111);
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
                <th scope="col">Titre du poste</th>
                <th scope="col">Description</th>
                <th scope="col">Type de contrat</th>
                <th scope="col">Formation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offers as $offer)
            <tr class="table-row" data-url="{{ route('affiche_condidat', ['id' => $offer->id]) }}">
                <td>{{ $offer->titre_poste }}</td>
                <td>{{ $offer->description_poste }}</td>
                <td>{{ $offer->type_contrat }}</td>
                <td>{{ $offer->formation_requise }}</td>
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
