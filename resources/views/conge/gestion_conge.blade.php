@extends('layouts.app')
@section('title', 'Gestion des Congés')
@section('content')

<style>.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.title-container h1 {
    text-align: center;
    color: #333;
    font-size: 24px;
    padding-bottom: 40px;
}

form {
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    padding: 8px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f9f9f9;
}

input[type="text"] {
    width: 70%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-outline-secondary {
    background-color: transparent;
    color: #333;
    border: 1px solid #333;
}

.btn-outline-secondary:hover {
    background-color: #333;
    color: #fff;
}


/* Styles pour la barre de recherche */

.search-bar {
    margin-bottom: 60px;
}

.search-bar label {
    margin-right: 10px;
}

.search-bar input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-right: 100px;
}

.search-bar button {
    padding: 8px 15px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    margin-left: -70px;
}

.search-bar button:hover {
    background-color: #0056b3;
}

.approve-button {
    background-color: #0056b3;
    padding: 10px;
    border-radius: 14px;
    color: white;
}

.cancel-button {
    background-color: black;
    color: white;
    padding: 10px;
    border-radius: 14px;
}</style>
<div class="container">
    <div class="title-container">
        <h1>Administration des congés</h1>
    </div>

    <!-- Barre de recherche par nom -->
    <div class="search-bar">
        <label for="searchName">Rechercher par nom :</label>
        <input type="text" id="searchName" onkeyup="handleEnter(event)">
        <button onclick="filterByName()">Filtrer</button> 
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