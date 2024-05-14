@extends('layouts.app')
@section('title', 'Gestion des employés')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/gestion_employee.css">
<div class="navbar">
    <div class="add_emp">
        <nav>
            <a href="{{ route('add_employee') }}">
                <i class="fas fa-user-plus"></i>
            </a>
        </nav>
    </div>
</div>

<div class="search-bar">
    <input type="text" id="searchName" onkeyup="filterByName()">
    <i class="fas fa-search" style="cursor: pointer;"></i>
</div>


<div class="array_emp ">

    <div class="scrollable-div">
    <table>
    <tr>
        <th>Prénom</th>
        <th>Nom de famille</th>
        <th>Âge</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Ville</th>
        <th>Role</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>

    <!-- Afficher d'abord les candidats -->
    @foreach($employees as $employee)
        @if($employee->role == 'employee')
        <tr>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>
                    <div class="age" data-dob="{{ $employee->date_of_birth }}"></div>
                </td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->city ? $employee->city : "null" }}</td>
                <td>{{ $employee->role}}</td>
                <td><a href="{{ route('employee.Edit', ['employee' => $employee->id]) }}" class="Edit-link" data-employee-id="{{ $employee->id }}"><i class="fas fa-pencil-alt"></i> Modifier</a></td>
                <td><a class="delete-link" data-employee-id="{{ $employee->id }}"><i class="fas fa-trash-alt"></i> Supprimer</a></td>
            </tr>
        @endif
    @endforeach

    <!-- Ensuite, affichez les employés -->
    @foreach($employees as $employee)
        @if($employee->role == 'condidat')
            <tr>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>
                    <div class="age" data-dob="{{ $employee->date_of_birth }}"></div>
                </td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->city ? $employee->city : "null" }}</td>
                <td>{{ $employee->role}}</td>
                <td><a href="{{ route('employee.Edit', ['employee' => $employee->id]) }}" class="Edit-link" data-employee-id="{{ $employee->id }}"><i class="fas fa-pencil-alt"></i> Modifier</a></td>
                <td><a class="delete-link" data-employee-id="{{ $employee->id }}"><i class="fas fa-trash-alt"></i> Supprimer</a></td>
            </tr>
            <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee) }}" method="post" style="display: none;">
                @csrf
                @method('delete')
            </form>
        @endif
    @endforeach
</table>

    </div>
</div>

<script src="js/delete.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ageSpans = document.querySelectorAll('.age');
        ageSpans.forEach(function(ageSpan) {
            var dob = new Date(ageSpan.dataset.dob);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();

            if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
                age--;
            }

            ageSpan.textContent = age;
        });
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
            var firstNameCell = row.cells[0].textContent.toLowerCase(); // La cellule de la colonne "Prénom"
            var lastNameCell = row.cells[1].textContent.toLowerCase(); // La cellule de la colonne "Nom de famille"

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
