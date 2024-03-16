@extends('layouts.app')
@section('titel','Add Absence')
@section('content')
<style>
    .divform {
        display: flex;
        justify-content: center;
        align-items: center;

    }


    form {
        background-color: white;
        padding-left: 13px;
        padding-right: 13px;
        padding-top: 13px;
        padding-bottom: 5px;
        border-radius: 8px;
        margin-bottom: 10px;
        margin-top: 13px;
        width: 33%;
    }

    .divbutton {
        background-color: rgba(255, 0, 0, 0.7);
        color: white;
        padding: 8px;
        float: right;
        text-align: center;
        border-radius: 12px;
        width: 80px;
        margin: 8px;
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
        <!-- Employee ID -->
        <div>
            <x-input-label for="employee_id" :value="__('Employee:')" />
            <select name="employee_id" class="block mt-1 w-full">
                @foreach ($employees as $absence)
                <option value="{{ $absence->id }}">
                    {{ $absence->first_name }} {{ $absence->last_name }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Start Date -->
        <div>
            <x-input-label for="start_date" :value="__('Start Date')" />
            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required />
            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
        </div>

        <!-- End Date -->
        <div>
            <x-input-label for="end_date" :value="__('End Date')" />
            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date')" required />
            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
        </div>

        <!-- Duration -->
        <div>
            <x-input-label for="duration" :value="__('Duration')" />
            <x-text-input id="duration" class="block mt-1 w-full" type="number" name="duration" step="1" :value="old('duration')" required />
            <x-input-error :messages="$errors->get('duration')" class="mt-2" />
        </div>



        <!-- Absence Type -->
        <div>
            <x-input-label for="absence_type" :value="__('Absence Type')" />
            <select id="absence_type" name="absence_type" class="block mt-1 w-full" required>
                <option value="Congé payé" @if(old('absence_type')=='Congé payé' ) selected @endif>Congé payé</option>
                <option value="Congé maladie" @if(old('absence_type')=='Congé maladie' ) selected @endif>Congé maladie</option>
                <option value="Congé sans solde" @if(old('absence_type')=='Congé sans solde' ) selected @endif>Congé sans solde</option>
            </select>
            <x-input-error :messages="$errors->get('absence_type')" class="mt-2" />
        </div>



        <!-- Reason -->
        <div>
            <x-input-label for="reason" :value="__('Reason')" />
            <x-text-input id="reason" class="block mt-1 w-full" type="text" name="reason" :value="old('reason')" required />
            <x-input-error :messages="$errors->get('reason')" class="mt-2" />
        </div>

        <!-- Comments -->
        <x-input-label for="comments" :value="__('Comments')" />
        <textarea id="comments" class="block mt-1 w-full" name="comments">{{ old('comments') }}</textarea>
        <x-input-error :messages="$errors->get('comments')" class="mt-2" />


        <!-- Document Path -->
        <div>
            <x-input-label for="document_path" :value="__('Document Path')" />
            <x-text-input id="document_path" class="block mt-1 w-full" type="file" name="document_path" :value="old('document_path')" />
            <x-input-error :messages="$errors->get('document_path')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="divbutton"><button type="submit">Save</button>
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