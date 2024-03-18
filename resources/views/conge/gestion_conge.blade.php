@extends('layouts.app')
@section('title', 'Gestion des Congés')
@section('content')


<div class="container">
    <div class="title-container">
        <h1>Administration des congés</h1>
    </div>

    <!-- Barre de recherche par nom -->
    <div class="search-bar">
        <label for="searchName">Rechercher par nom :</label>
        <input type="text" id="searchName" onkeyup="handleEnter(event)">
        <button onclick="filterByName()">Filtrer</button> <!-- Assurez-vous que le onclick est correctement lié à la fonction -->
    </div>

    <!-- Tableau des congés -->
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
                <td>{{ $conge['employee_id'] }}</td>
                <td>{{ $conge['start_date'] }}</td>
                <td>{{ $conge['end_date'] }}</td>
                <td>{{ $conge['status'] }}</td>
                <td><button class="approve-button">Approuver</button></td>
                <td> <button class="cancel-button">Annuler</button></td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    <script>
        function handleEnter(event) {
            if (event.key === 'Enter') {
                filterByName();
            }
        }

        function filterByName() {
            var searchName = document.getElementById('searchName').value.toLowerCase();
            var tableRows = document.querySelectorAll('.table_conge tr');

            tableRows.forEach(function(row, index) {
                if (index !== 0) { 
                    var nameCell = row.cells[0].textContent.toLowerCase(); 

                    if (nameCell.includes(searchName)) {
                        row.style.display = ''; 
                    } else {
                        row.style.display = 'none'; 
                    }
                }

            });
        }
        
    </script>
</div>
@endsection