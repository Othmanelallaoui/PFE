<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire pour candidat intéressé par une offre</title>
    <link rel="stylesheet" href="css/welcmeCss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/demande_conge.css')}}">

       
</head>
<header>
    @include('layouts.navwel')
</header>

<body style="background-image:url('{{ asset('images/backRH.png') }}'); background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <h2>Demande de congé</h2>

        <div class="divform" id="demande-conge-form" @if(!$conges->isEmpty()) style="display:none;" @endif>
            <div class="return-icon" id="return-icon" onclick="toggleForm()" style="display:none;">
                <i class="fas fa-arrow-left"></i> Retour à la liste des demandes
            </div>
            <form class="formdemande" method="POST" action="{{ route('store_demande_conge') }}">
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

        @if(!$conges->isEmpty())
        <div id="list_demande">
            <h3>Vos demandes de congé existantes</h3>
            <table>
                <thead>
                    <tr>
                        <th>Motif</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($conges as $conge)
                    <tr>
                        <td>{{ $conge->motif }}</td>
                        <td>{{ $conge->date_debut }}</td>
                        <td>{{ $conge->date_fin }}</td>
                        <td>{{ $conge->statu }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button onclick="toggleForm()" class="fair_demande">Faire une nouvelle demande</button>
        </div>
        @endif

    </div>

    <script>
        function toggleForm() {
            var form = document.getElementById('demande-conge-form');
            var list = document.getElementById('list_demande');
            var returnIcon = document.getElementById('return-icon');
            if (form.style.display === 'none') {
                form.style.display = 'block';
                returnIcon.style.display = 'flex';
                if (list) {
                    list.style.display = 'none';
                }
            } else {
                form.style.display = 'none';
                returnIcon.style.display = 'none';
                if (list) {
                    list.style.display = 'block';
                }
            }
        }
    </script>
</body>

</html>