<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres des emplois</title>
    <style>
        body{
            background-color: rgba(30, 20, 52, 0.5);
        }
        .offer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 70px 70px 0px 70px;
            
        }

        .offer-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            width: calc(33.33% - 20px);
            /* 33.33% width with margin */
            box-sizing: border-box;
        }
        .offer-card:hover{
            cursor: pointer;
        }

        .offer-card h2 {
            margin-top: 0;
        }

        .offer-card p {
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
    <link rel="stylesheet" href="css/welcmeCss.css">
</head>

<body>
<section id="Home" style="background-image:url('<?php echo asset('images/backRH.png'); ?>'); background-repeat: no-repeat; background-size: cover; ">

    @include('layouts.navwel')

    <div class="offer-container">
        @foreach ($offers as $offer)
        
            <div class="offer-card table-row" data-url="{{ route('Offre_details', ['id' => $offer]) }}">
                <h2>{{ $offer->titre_poste }}</h2>
                <p><strong>Date de publication:</strong> {{ $offer->date_publication }}</p>
                <p><strong>Date de clôture:</strong> {{ $offer->date_cloture }}</p>
            </div>
        
        @endforeach
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
</body>

</html>
