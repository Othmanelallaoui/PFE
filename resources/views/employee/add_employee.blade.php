@extends('layouts.app')
@section('title', 'Ajouter un employé')
@section('content')

<style>
    
    .divformaddemp {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
    }


   .divformaddemp form {
        margin-top: 25px;
        background-color: white;
        padding: 15px;
        border-radius: 8px;
        height: 90%;
        width: 40%;
        box-shadow: 10px 1px 100px 0px rgba(0, 0, 0, 0.5);



    }

    .w-1 {

        width: 17%;
    }

    


    input[type="date"] {
        border-radius: 7px;
    }
input[type="text"],input[type="password"],input[type="email"]
{
    border-radius: 7px;
    border: 1px grey solid;
}
#last_name {
    border-radius: 7px;
    border: 1px grey solid;
}
    select {
        border-radius: 8px;
    }
</style>


<div class="divformaddemp">
    <form method="POST" action="{{ route('employees.store') }}">
        @csrf
        <!-- Prénom -->
        <div>
            <input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" placeholder="Prénom" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Nom de famille -->

        <div class="mt-2">
            <input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" placeholder="Nom de famille" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Date de naissance -->
        <div class="mt-2">
            <input id="date_of_birth" type="date" class="block mt-1 w-full" name="date_of_birth" :value="old('date_of_birth')" required autofocus autocomplete="bdate" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div>

        <!-- Adresse e-mail -->
        <div class="mt-2">
            <input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="email@gmail.com"  :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="********"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Téléphone -->

        <div class="mt-2">
            <div class="flex items-center">
                <x-text-input type="text" class="block mt-1 w-1" value="+212" readonly />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />

            <!-- Ville -->
            <div class="mt-2">
                <select id="city" name="city" class="block mt-1 w-full" required>
                    @foreach($moroccanCities as $city)
                    <option value="{{ $city }}" {{ old('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>


            <!-- Sexe -->

            <div>
                <select id="sexe" name="sexe" class="block mt-1 w-full" required autofocus autocomplete="sexe">
                    <option value="homme" {{ old('sexe') == 'homme' ? 'selected' : '' }}>Homme</option>
                    <option value="femme" {{ old('sexe') == 'femme' ? 'selected' : '' }}>Femme</option>
                </select>
                <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
               

                <x-primary-button class="ms-4" style="background-color: #007bff; color: #ffffff;">
                    {{ __('Enregistrer') }}
                </x-primary-button>

            </div>
    </form>

</div>


@endsection
