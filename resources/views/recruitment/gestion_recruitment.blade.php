@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/conge.css">

<style>
    .add_emp {

        float: right;
        margin-top: 20px;
        margin-right: 20px;


    }

    /* CSS pour styliser le tableau */
    .table {
        width: 60%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 8px;
        border: 1px solid black;
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
</style>


<div class="bar">
    <div class="add_emp">
        <nav>
            <a href="{{ route('add_offer') }}"><i class="fas fa-plus"> </i> Ajouter un Offre </a>
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

                <!-- Ajoutez d'autres en-têtes de colonnes selon vos besoins -->
            </tr>
        </thead>
        <tbody>
            @foreach ($offers as $offer)
            <tr>
                <td>{{ $offer->titre_poste }}</td>
                <td>{{ $offer->description_poste }}</td>
                <td>{{ $offer->type_contrat }}</td>
                <td>{{ $offer->formation_requise }}</td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection