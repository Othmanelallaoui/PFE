@extends('layouts.app')
@section('title', 'Modifier l\'employé')
@section('content')
<style>
    .divform {
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .w-1 {

        width: 20%;
    }

  
</style>
<link rel="stylesheet" href="css/sidebare.css">

<div class="divform">
    <form method="POST" action="{{ route('employees.update',['employee'=> $employee->id]) }}">
        @csrf
        @method('PUT')

        <!-- Prénom -->
        <div>
            <input id="first_name" class="block mt-1 w-full" type="text" name="first_name" placeholder="Prénom" value="{{ $employee->first_name }}" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>
        <!-- Nom de famille -->

        <div class="mt-2">
            <input id="last_name" class="block mt-1 w-full" type="text" name="last_name" placeholder="Nom de famille" value="{{ $employee->last_name }}" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>


        <!-- Adresse e-mail -->
        <div class="mt-2">
            <input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Email" value="{{ $employee->email }}" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Téléphone -->
        <div class="mt-2">
            <input id="phone" class="block mt-1 w-full" type="text" name="phone" placeholder="Téléphone" value="{{ $employee->phone }}" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>


        <!-- Sexe -->

        <div class="mt-2">
            <select id="sexe" name="sexe" class="block mt-1 w-full" required autofocus autocomplete="sexe">
                <option value="homme" {{ $employee->sexe == 'homme' ? 'selected' : '' }}>Homme</option>
                <option value="femme" {{  $employee->sexe == 'femme' ? 'selected' : '' }}>Femme</option>
            </select>
            <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
        </div>

        <!-- Ville -->
        <div class="mt-2">
            <select id="city" name="city" class="block mt-1 w-full" required>
                <option value="">Sélectionnez une ville</option>
                @foreach($moroccanCities as $city)
                <option value="{{ $city }}" {{ $employee->city == $city ? 'selected' : '' }}>{{ $city }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <button type="submit" class="block mt-4 w-full" style="background-color: blue; color:#ffffff">
            {{ __('Enregistrer les modifications') }}
        </button>
    </form>
</div>

@endsection
