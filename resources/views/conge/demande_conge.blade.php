<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire pour candidat intéressé par une offre</title>
    <link rel="stylesheet" href="/css/demande_conge.css">
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
    </style>
</head>
<header>
    @include('layouts.navwel')
</header>

<body>

    <div class="container">
        <h2>Demande de congé</h2>
        <div class="divform">
            <form method="POST" action="{{ route('store_demande_conge') }}">
                @csrf
                @php
                $user = Auth::guard('employee')->user();
                @endphp

                <div class="form-group">
                <input type="hidden" name="employee_id" value="{{ $user->id }}">

                    <input type="text" name="first_name" class="form-control" placeholder="Prénom" id="first_name" value="{{ $user->first_name }}" readonly>
                </div>

                <div class="form-group">
                    <input type="text" name="last_name" class="form-control" placeholder="Nom" id="last_name" value="{{ $user->last_name }}" readonly>
                </div>

                <div class="form-group">
                    <input type="text" name="motif" class="form-control" placeholder="Motif de la demande de congé" id="motif" required>
                </div>

                <div class="form-group">
                    <input type="date" name="date_debut" class="form-control" placeholder="Date de début du congé" id="date_debut" required>
                </div>

                <div class="form-group">
                    <input type="date" name="date_fin" class="form-control" placeholder="Date de fin du congé" id="date_fin" required>
                </div>

                <div class="form-group">
                    <textarea name="commentaire" class="form-control" placeholder="Commentaire (facultatif)" id="commentaire" rows="2"></textarea>
                </div>

                <button type="submit" class="envoyer">Envoyer la demande de congé</button>
            </form>

        </div>

    </div>
</body>

</html>