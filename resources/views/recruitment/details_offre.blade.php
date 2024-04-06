<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'offre</title>
    <style>
        .offer-container {
            display: flex;
            justify-content: center;
            padding: 100px 100px 0px 100px;
        }

        table {
            box-shadow: 10px 1px 100px 0px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            width: 100%;
        }

        td,
        tr {
            padding: 8px;
        }

        .offer-table {
            margin-top: -20px;
            width: 900px;
            margin-bottom: 30px;
        }

        .offer-table a {
            color: white;
            border: 1px solid black;
            float: right;
            padding: 8px;
            border-radius: 8px;
            background-color: black;
            cursor: pointer;
            text-decoration: none;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        th {
            font-size: 20px;
            padding: 20px;
        }
        td{
            width: 30px;
        }
    </style>
    <link rel="stylesheet" href="css/welcmeCss.css">
</head>

<body>
    @include('layouts.navwel')

    <div class="offer-container">
        <table class="offer-table">
            <tr>
                <th colspan="2">Informations sur l'offre</th>
            </tr>
            <tr>
                <td><span>Titre :</span></td>
                <td>{{ $offer->titre_poste }}</td>
            </tr>
            <tr>
                <td><span>Description :</span></td>
                <td>{{ $offer->description_poste }}</td>
            </tr>
            <tr>
                <td><span>Date de publication :</span></td>
                <td>{{ $offer->date_publication }}</td>
            </tr>
            <tr>
                <td><span>Date de clôture :</span></td>
                <td>{{ $offer->date_cloture }}</td>
            </tr>
            <tr>
                <td><span>Type de contrat :</span></td>
                <td>{{ $offer->type_contrat }}</td>
            </tr>
            <tr>
                <td><span>Salaire proposé :</span></td>
                <td>{{ $offer->salaire_propose }} MAD</td>
            </tr>
            <tr>
                <td><span>Formation requise :</span></td>
                <td>{{ $offer->formation_requise }}</td>
            </tr>
            <tr>
                <td><span>Expérience requise :</span></td>
                <td>{{ $offer->experience_requise }}</td>
            </tr>
            <tr>
                <td><span>Langues requises :</span></td>
                <td>{{ $offer->langues_requises }}</td>
            </tr>
            <tr>
                <td colspan="2"><a href="{{ route('form_candidat_offre', ['id' => $offer]) }}">Je suis intéressé</a></td>
            </tr>
        </table>
    </div>
</body>

</html>
