@extends('layouts.app')
@section('title', 'Gestion des Congés')
@section('content')

<link rel="stylesheet" href="{{ asset('css/gestion_conge.css') }}">

<div class="container">
    <div class="title-container">
        <h1>Administration des congés</h1>
    </div>

    <!-- Barre de recherche par nom et filtre par statut -->
    <div class="search-bar">
        <label for="searchName">Rechercher par nom :</label>
        <input type="text" id="searchName" onkeyup="filterTable()">
        <label for="statusFilter">Filtrer par statut :</label>
        <select id="statusFilter" onchange="filterTable()">
            <option value="">Tous</option>
            <option value="en attente" selected>En attente</option>
            <option value="approuvée">Approuvée</option>
            <option value="refuser">Refusée</option>
        </select>
    </div>

    <table class="table_conge">
        <thead>
            <tr>
                <th>Employé</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Statut</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody class="array_conge">
            @foreach($conges as $conge)
            <tr>
                <td>{{ $conge->employee->first_name }} {{ $conge->employee->last_name }}</td> <!-- Afficher le nom complet de l'employé -->
                <td>{{ $conge->date_debut }}</td>
                <td>{{ $conge->date_fin }}</td>
                <td>{{ $conge->statu }}</td>
                <td>
                    <form action="{{ route('conges.approve', $conge->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="approve-button">Approuver</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('conges.cancel', $conge->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="cancel-button">Annuler</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            filterTable();
        });

        function filterTable() {
            var searchName = document.getElementById('searchName').value.toLowerCase();
            var statusFilter = document.getElementById('statusFilter').value;
            var tableRows = document.querySelectorAll('.table_conge tbody tr');

            tableRows.forEach(function(row) {
                var nameCell = row.cells[0].textContent.toLowerCase();
                var statusCell = row.cells[3].textContent;

                var nameMatches = nameCell.includes(searchName);
                var statusMatches = statusFilter === "" || statusCell === statusFilter;

                if (nameMatches && statusMatches) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
</div>
@endsection
