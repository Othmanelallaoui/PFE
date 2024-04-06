@extends('layouts.app')
@section('title','Gestion des absences')
@section('content')
<link rel="stylesheet" href="/css/gestion_absence.css">

<div class="add_abs">
    <nav>
        <a href="{{route('add_absence')}}"><i class="fas fa-plus"></i> <i class="fas fa-calendar-plus"></i>
        </a>
    </nav>
</div>

<div class="search-bar">
    <input type="date" id="searchDate" onkeyup="handleEnterDate(event)">
    <i class="fas fa-search" onclick="filterByDate()" style="cursor: pointer;"></i>
</div>
<div class="search-bar1">
    <input type="text" id="searchName" onkeyup="handleEnterName(event)">
    <i class="fas fa-search" onclick="filterByName()" style="cursor: pointer;"></i>
</div>

<div class="array_emp">
    <div class="scrollable-div">
        <table>
            <tr>
                <th>Prénom</th>
                <th>Nom de famille</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Raison</th>
                <th>Jours d'absence</th>
            </tr>
            @foreach($absences as $absence)
            @foreach($employees as $employee)
            @if($employee->id == $absence->employee_id)
            <tr>
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
            if (index !== 0) {
                var startDateCell = new Date(row.cells[3].textContent);
                var endDateCell = new Date(row.cells[4].textContent);

                var overlap = !(endDateCell < searchDate || startDateCell > searchDate);

                if (overlap) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    }

    function filterByName() {
        var searchName = document.getElementById('searchName').value.toLowerCase();
        var tableRows = document.querySelectorAll('.array_emp table tr');

        tableRows.forEach(function(row, index) {
            if (index !== 0) {
                var firstNameCell = row.cells[0].textContent.toLowerCase();
                var lastNameCell = row.cells[1].textContent.toLowerCase();

                if (firstNameCell.includes(searchName) || lastNameCell.includes(searchName)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    }
</script>

@endsection
