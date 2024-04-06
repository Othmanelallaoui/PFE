@extends('layouts.guest')
@section('title', 'Créer un compte')
@section('content')

<style>
    .divform {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
    }

    form {
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

    input[type="text"],
    input[type="password"],
    input[type="email"] {
        border-radius: 7px;
        border: 1px grey solid;
    }

    select {
        border-radius: 8px;
    }
</style>

<div class="divform">
    <form method="POST" action="{{ route('store_condidat') }}">
        @csrf
        <!-- First name -->
        <div>
            <label for="first_name">{{ __('First Name') }}</label>
            <input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" placeholder="{{ __('First name') }}" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-2">
            <label for="last_name">{{ __('Last Name') }}</label>
            <input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" placeholder="{{ __('Last name') }}" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Date of Birth -->
        <div class="mt-2">
            <label for="date_of_birth">{{ __('Date of Birth') }}</label>
            <input id="date_of_birth" type="date" class="block mt-1 w-full" name="date_of_birth" :value="old('date_of_birth')" required autofocus autocomplete="bdate" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-2">
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="email@gmail.com" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-2">
            <label for="phone">{{ __('Phone') }}</label>
            <div class="flex items-center">
                <x-text-input type="text" class="block mt-1 w-1" value="+212" readonly />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- City -->
        <div class="mt-2">
            <label for="city">{{ __('City') }}</label>
            <input id="city" class="block mt-1 w-full" type="text" name="city" placeholder="{{ __('City') }}" :value="old('city')" required />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- Sex -->
        <div class="mt-2">
            <label for="sexe">{{ __('Sex') }}</label>
            <select id="sexe" name="sexe" class="block mt-1 w-full" required autofocus autocomplete="sexe">
                <option value="homme" {{ old('sexe') == 'homme' ? 'selected' : '' }}>{{ __('Homme') }}</option>
                <option value="femme" {{ old('sexe') == 'femme' ? 'selected' : '' }}>{{ __('Femme') }}</option>
            </select>
            <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="********" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4" style="background-color: #007bff; color: #ffffff;">
                {{ __("S'inscrire") }}
            </x-primary-button>
        </div>
    </form>
</div>

@endsection
