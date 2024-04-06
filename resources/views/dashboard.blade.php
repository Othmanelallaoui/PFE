@extends('layouts.app')
@section('title', 'Tableau de bord')
@section('content')
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    <!-- Ajouter le lien vers Chart.js -->
    <script src="path/to/chart.js"></script>
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-BUfrV3L3gOaJmNPUyaZs+Tq6yajY46b65ZZkyA53U4LbKvBvqufz5RWX6Lk+xEpZ1KdH/pXuU6wUG9Qbp+LJOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }


        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            min-height: 100vh;
            margin-bottom: 70px;
        }



        .main-content {
            padding: 20px;
            margin-left: 160px;
            width: 80%;
            height: 700px; margin-top: 30px;
            border-radius: 8px;
        }





        .main-content h2 {

            margin-bottom: 20px;
        }



        .dashboard-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f5f5f5;
            padding: 10px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .stat-item {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">


        @section('title', 'dashboard')

        <div class="main-content" id="main-content"     >           
        </div>
    </div>

    <script>
    let employeeCount = {{$numberOfEmployees}} ;
        let leaveRequests = {{$numberOfCondidat}};
        let absenceRequests = 120;
        let recrutementRequests={{$recrutementRequests}};

        function showHome() {
            document.getElementById('main-content').innerHTML = `
                <div class="dashboard-stats">
                    <div class="stat-item">
					<i class="fas fa-users stat-icon" style="color: #007bff;"></i>
                        <h3>Nombre d'employés</h3>
                        <p id="employeeCount">${employeeCount}</p>
                    </div>
                    <div class="stat-item">
					 <i class="far fa-calendar-alt stat-icon" style="color: #28a745;"></i>
                        <h3>Nombre de Condidats</h3>
                        <p id="leaveRequests">${leaveRequests}</p>
                    </div>
                    <div class="stat-item">
					 <i class="far fa-calendar-times stat-icon" style="color: #dc3545;"></i>
                        <h3>Demandes d'absence</h3>
                        <p id="absenceRequests">${absenceRequests}</p>
                    </div>
                    <div class="stat-item">
					<i class="fas fa-user-plus" style="color:blue;"></i>
                        <h3>Demandes de recrutement</h3>
                        <p id="recrutementRequests">${recrutementRequests}</p>
                    </div>
                </div>
                <h2>Accueil</h2>
                <div id="chart-container">
                    <canvas id="myChart"></canvas>
                </div>
            `;
            createChart();
        }

       
        function createChart() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Nombre d\'employés recrutés', // Modifier le libellé ici
                        data: [12, 19, 3, 5, 2, 3], // Données à remplacer par vos données réelles
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }


        document.addEventListener('DOMContentLoaded', function() {
            showHome();
            
        });
    </script>
</body>

</html>



@endsection
