<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire pour candidat intéressé par une offre</title>
    <link rel="stylesheet" href="/css/form_condidat.css">
    <link rel="stylesheet" href="css/welcmeCss.css">
    <style>
        .navigation-menu {
            background-color: rgba(0, 0, 0, 0.356);
            color: white;
            font-family: 'figtree', sans-serif;
            padding: 15px;
            position: static;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.356);
            margin-bottom: -10px;
        }
        .envoyer{
            padding: 8px;
background-color: rgba(0, 0, 0, 0.89);            color: white;
            border-radius: 8px;
            float: right;
        }
    </style>
</head>
<header>
    @include('layouts.navwel')
</header>

<body>

    <div class="container">
        <h2>{{ $offer->titre_poste }}</h2>
        <form method="POST" action="{{ route('demande_recrutment.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="offer_id" value="{{ $offer->id }}">

            @php
            $user = Auth::guard('employee')->user();
            @endphp


            <input type="hidden" name="id_condidat" value="{{ $user->id }}">

            <label for="first_name">Prénom:</label><br>
            <input type="text" id="first_name" name="first_name" placeholder="prénom:" value="{{ $user->first_name }} "><br><br>

            <label for="last_name">Nom:</label><br>
            <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }} "><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ $user->email }}"><br><br>


            <label for="phone">Téléphone:</label><br>
            <input type="tel" id="phone" name="phone" required><br><br>

            <label for="resume">CV:</label><br>
            <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required><br><br>

            <label for="message">Message (optionnel):</label><br>
            <textarea id="message" name="message"></textarea><br>

            <button type="submit" class="envoyer">Envoyer</button>
        </form>

    </div>
</body>

</html>