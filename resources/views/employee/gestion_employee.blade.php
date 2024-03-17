@extends('layouts.app')
@section('title', 'Employee management')
@section('content')
<link rel="stylesheet" href="css/add.css">
<style>
    .add_emp a{
        background-color: rgba(0, 0, 240, 0.7);

    }
    .add_emp a:hover{
        background-color: rgba(0, 0, 245, 0.8);
        border-radius: 15px;

    }
    .scrollable-div {
        max-height: 460px;
        overflow-y: auto;
        border: 1px solid #ccc;
        box-shadow: inset;
        padding: 10px;
        margin-left: -10px;
    }

    th,
    td {
        border: 1px solid white;
        padding: 8px;
        text-align: center;
        font-size: 18px;
    }

    th {
        background-color: #f2f2f2;
        font-size: 20px;
    }

    table {
        width: 80%;
    }

    .search-bar {
        float:left ;
        margin-top: -12px;
        margin-left: 120px;
    }

    .search-bar input[type="text"] {
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 50px;
    }

    .search-bar button {
        cursor: pointer;
        background-color: rgba(0, 0, 250, 0.6);
        padding: 8px;
        border-radius: 10px;
    }

    .search-bar button:hover {
        background-color: rgba(0, 0, 255, 0.9);
        border-radius: 45px;

    }
    .navbar{
        margin-top: 30px;
    }
    .array_emp{
        display: block;
        align-items: baseline;
    }
   
</style>
<div class="navbar"><div class="add_emp">
    <nav>
        <a href="{{ route('add_employee') }}"><i class="fas fa-plus">  </i> Add Employee </a>
    </nav>
</div>

<div class="search-bar">
    <label for="searchName">Search by Name:</label>
    <input type="text" id="searchName" onkeyup="handleEnter(event)">
    <button onclick="filterByName()">Filter</button>
</div></div>


<div class="array_emp">
    <h1>Liste des employés</h1>

    <div class="scrollable-div">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td><span id="age_{{ $employee->id }}"></span></td>  
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->city ? $employee->city : "null" }}</td>
                    <td><a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="Edit-link" data-employee-id="{{ $employee->id }}"><i class="fas fa-pencil-alt"></i> Edit</a></td>
                    <td><a class="delete-link" data-employee-id="{{ $employee->id }}"><i class="fas fa-trash-alt"></i> Delete</a></td>
                </tr>

                <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee) }}" method="post" style="display: none;">
                    @csrf
                    @method('delete')
                </form>
                
            @endforeach
        </table>
    </div>
</div>

<script src="js/delete.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
            var birthdate = new Date("{{ $employee->date_of_birth }}");
            var today = new Date();
            var age = today.getFullYear() - birthdate.getFullYear();

            // Si l'anniversaire n'est pas encore passé cette année, ajustez l'âge
            if (today.getMonth() < birthdate.getMonth() || (today.getMonth() === birthdate.getMonth() && today.getDate() < birthdate.getDate())) {
                age--;
            }

            document.getElementById('age_{{ $employee->id }}').textContent = age;
        });
     function handleEnter(event) {
        if (event.key === 'Enter') {
            filterByName();
        }
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
