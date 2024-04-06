@extends('layouts.app')
@section('title', 'Edit-Employee')
@section('content')
<link rel="stylesheet" href="{{asset('css/edit_emp.css')}}">


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
        <div class="mt-2">
            <select id="role" name="role" class="block mt-1 w-full" required autofocus autocomplete="role">
                <option value="employee" {{ $employee->role == 'employee' ? 'selected' : '' }}>Employé</option>
                <option value="condidat" {{  $employee->role == 'condidat' ? 'selected' : '' }}>Candidat</option>
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

        <div class="flex items-center justify-end mt-4">


               <x-primary-button class="ms-4" style="background-color: #007bff; color: #ffffff;">
                   {{ __('Enregistrer') }}
               </x-primary-button>

           </div>
    </form>
</div>


<script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");


    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    })

    searchBtn.addEventListener("click", () => {
        sidebar.classList.remove("close");
    })

    modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
            modeText.innerText = "Mode lumineux";
        } else {
            modeText.innerText = "Mode sombre";

        }
    });
</script>
@endsection