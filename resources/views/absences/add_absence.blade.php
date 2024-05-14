@extends('layouts.app')
@section('titel','Ajouter une absence')
@section('content')
<style>
    .divform {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .divform form {
        background-color: white;
        border-radius: 8px;
        padding: 6px 20px;
        width: 40%;
        margin: 8px 6px;
        bottom: 10px;
        box-shadow: 10px 1px 100px 0px rgba(0, 0, 0, 0.5);
    }

    .divbutton button {
        background-color: rgba(255, 0, 0, 0.7);
        color: white;
        padding: 8px;
        text-align: center;
        border-radius: 12px;
        margin: 6px;
        border: none;
        cursor: pointer;
    }

    input[type="file"] {
        border-radius: 7px;
        width: 100%;
        border: 1px solid black;
        background-color: white;
    }

    select,
    textarea {
        border-radius: 8px;
    }
</style>

<div class="divform">

    <form action="{{ route('absences.store') }}" method="POST">
        @csrf
        <!-- ID de l'employé -->
        <div>
            <label for="employee_id">{{ __('Employé :') }}</label>
            <select name="employee_id" class="block mt-1 w-full">
                @foreach ($employees as $absence)
                <option value="{{ $absence->id }}">
                    {{ $absence->first_name }} {{ $absence->last_name }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Date de début -->
        <div>
            <label for="start_date">{{ __('Date de début') }}</label>
            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required />
            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
        </div>

        <!-- Date de fin -->
        <div>
            <label for="end_date">{{ __('Date de fin') }}</label>
            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date')" required />
            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
        </div>

        <!-- Durée -->
        <div>
            <label for="duration">{{ __('Durée') }}</label>
            <x-text-input id="duration" class="block mt-1 w-full" type="number" name="duration" step="1" :value="old('duration')" required />
            <x-input-error :messages="$errors->get('duration')" class="mt-2" />
        </div>

        <!-- Type d'absence -->
        <div>
            <label for="absence_type">{{ __('Type d\'absence') }}</label>
            <select id="absence_type" name="absence_type" class="block mt-1 w-full" required>
                <option value="Congé payé" @if(old('absence_type')=='Congé payé' ) selected @endif>Congé payé</option>
                <option value="Congé maladie" @if(old('absence_type')=='Congé maladie' ) selected @endif>Congé maladie</option>
                <option value="Congé sans solde" @if(old('absence_type')=='Congé sans solde' ) selected @endif>Congé sans solde</option>
            </select>
            <x-input-error :messages="$errors->get('absence_type')" class="mt-2" />
        </div>

        <!-- Raison -->
        <div>
            <label for="reason">{{ __('Raison') }}</label>
            <x-text-input id="reason" class="block mt-1 w-full" type="text" name="reason" :value="old('reason')" required />
            <x-input-error :messages="$errors->get('reason')" class="mt-2" />
        </div>

        <!-- Commentaires -->
        <div>
            <label for="comments">{{ __('Commentaires') }}</label>
            <textarea id="comments" class="block mt-1 w-full" name="comments">{{ old('comments') }}</textarea>
            <x-input-error :messages="$errors->get('comments')" class="mt-2" />
        </div>

        <!-- Chemin du document -->
        <div>
            <label for="document_path">{{ __('Chemin du document') }}</label>
            <x-text-input id="document_path" class="block mt-1 w-full" type="file" name="document_path" :value="old('document_path')" />
            <x-input-error :messages="$errors->get('document_path')" class="mt-2" />
        </div>

        <!-- Bouton de soumission -->
        <div class="divbutton">
            <button type="submit">{{ __('Enregistrer') }}</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var startDateInput = document.getElementById('start_date');
        var endDateInput = document.getElementById('end_date');
        var durationInput = document.getElementById('duration');

        startDateInput.addEventListener('change', updateDuration);
        endDateInput.addEventListener('change', updateDuration);

        function updateDuration() {
            var startDate = new Date(startDateInput.value);
            var endDate = new Date(endDateInput.value);

            if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
                var differenceInDays = Math.round((endDate - startDate) / (1000 * 3600 * 24));

                durationInput.value = differenceInDays;
            } else {
                durationInput.value = '';
            }
        }
    });
</script>

@endsection
