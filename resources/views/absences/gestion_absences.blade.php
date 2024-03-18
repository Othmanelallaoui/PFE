@extends('layouts.app')
@section('title','Management absences')
@section('content')
<link rel="stylesheet" href="css/add.css">

<style>
    .add_abs a {
        padding: 10px;
        margin: 10px;
        border-radius: 8px;
        background-color: rgba(245, 0, 0, 0.7);
        text-align: center;
    }

    .add_abs a:hover {

        background-color: rgba(255, 0, 0, 0.9);
        border-radius: 50px;


    }
 .scrollable-div {
        max-height: 460px;
        overflow-y: auto;
        padding: 10px;
    }
    .add_abs {
        float: right;
        margin-top: 30px;
    }

    .search-bar {
        margin-top: 20px;
        margin-left: 120px;
    }

    .search-bar input[type="date"] {
        margin-right: 10px;
        border-radius: 50px;
    }

    .search-bar button,.search-bar1 button {
        background-color: rgba(0, 0, 240, 0.5);
        padding: 8px;
        border-radius: 15px;
    }

    .search-bar button:hover,.search-bar1 button:hover {
        background-color: rgba(0, 0, 255, 0.9);
    }




    .search-bar1 {
        float:right ;
        margin-top: -40px;
        margin-right: 380px;
    }

    .search-bar1 input[type="text"] {
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 50px;
    }

 
</style>

<div class="add_abs">
    <nav>
        <a href="{{route('add_absence')}}"><i class="fas fa-plus"></i>Add Absence</a>
    </nav>
</div>

<div class="search-bar">
    <label for="searchDate">Search by Date:</label>
    <input type="date" id="searchDate" onkeyup="handleEnterDate(event)">
    <button onclick="filterByDate()">Filter</button>
</div> 
<div class="search-bar1">
    <label for="searchName">Search by Name:</label>
    <input type="text" id="searchName" onkeyup="handleEnterName(event)">
    <button onclick="filterByName()">Search</button>
</div>

<div class="array_emp">
<div class="scrollable-div">

    <table>
        <tr>
            <th></th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Reason</th>
            <th>Days absent</th>
        </tr>
        @foreach($absences as $absence)
        @foreach($employees as $employee)
        @if($employee->id == $absence->employee_id)
        <tr>
            <td>{{$absence->id}}</td>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $absence->start_date }}</td>
            <td>{{ $absence->end_date }}</td>
            <td>{{ $absence->reason }}</td>
            <td>{{ $absence->duration }}</td>
        </tr>
        @endif
        @endforeach
        @endforeach
    </table>
</div>
</div>

<script>
   function handleEnterDate(event) {
    if (event.key === 'Enter') {
        filterByDate();
    }
}

function handleEnterName(event) {
    if (event.key === 'Enter') {
        filterByName();
    }
}
    
    function filterByDate() {
        var searchDate = new Date(document.getElementById('searchDate').value);
        var tableRows = document.querySelectorAll('.array_emp table tr');

        tableRows.forEach(function(row, index) {
            if (index !== 0) { // Ignore la première ligne des en-têtes
                var startDateCell = new Date(row.cells[3].textContent); // La cellule de la colonne "Start Date"
                var endDateCell = new Date(row.cells[4].textContent); // La cellule de la colonne "End Date"

                // Vérifie si l'absence se chevauche avec la plage de dates spécifiée
                var overlap = !(endDateCell < searchDate || startDateCell > searchDate);

                if (overlap) {
                    row.style.display = ''; // Affiche la ligne si l'absence se chevauche avec la plage spécifiée
                } else {
                    row.style.display = 'none'; // Cache la ligne sinon
                }
            }
        });
    }
    function filterByName() {
        var searchName = document.getElementById('searchName').value.toLowerCase();
        var tableRows = document.querySelectorAll('.array_emp table tr');

        tableRows.forEach(function(row, index) {
            if (index !== 0) { // Ignore la première ligne des en-têtes
                var firstNameCell = row.cells[0].textContent.toLowerCase(); // La cellule de la colonne "First Name"
                var lastNameCell = row.cells[1].textContent.toLowerCase(); // La cellule de la colonne "Last Name"

                if (firstNameCell.includes(searchName) || lastNameCell.includes(searchName)) {
                    row.style.display = ''; // Affiche la ligne si le nom ou le prénom correspond à la recherche
                } else {
                    row.style.display = 'none'; // Cache la ligne sinon
                }
            }
        });
    }
</script>




@endsection