@extends('layouts.app')
@section('title', 'Add Employee')
@section('content')

<style>
    .divform {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }


    form {
        margin-top: 25px;
        background-color: white;
        padding: 15px;
        border-radius: 8px;
        height: 90%;
        width: 40%;


    }

    .w-1 {

        width: 17%;
    }

    


    input[type="date"] {
        border-radius: 7px;
    }

    select {
        border-radius: 8px;
    }
</style>


<div class="divform">
    <form method="POST" action="{{ route('employees.store') }}">
        @csrf
        <!-- first name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!--last Name -->

        <div class="mt-2">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Date of Birth -->
        <div class="mt-2">
            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
            <input id="date_of_birth" type="date" class="block mt-1 w-full" name="date_of_birth" :value="old('date_of_birth')" required autofocus autocomplete="bdate" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-2">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!--phone -->

        <div class="mt-2">
            <x-input-label for="phone" :value="__('Phone')" />
            <div class="flex items-center">
                <x-text-input type="text" class="block mt-1 w-1" value="+212" readonly />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />

            <!-- city-->
            <div class="mt-2">
                <x-input-label for="city" :value="__('City')" />
                <select id="city" name="city" class="block mt-1 w-full" required>
                    @foreach($moroccanCities as $city)
                    <option value="{{ $city }}" {{ old('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>


            <!--sexe -->

            <div>
                <x-input-label for="sexe" :value="__('Sexe')" />
                <select id="sexe" name="sexe" class="block mt-1 w-full" required autofocus autocomplete="sexe">
                    <option value="homme" {{ old('sexe') == 'homme' ? 'selected' : '' }}>Homme</option>
                    <option value="femme" {{ old('sexe') == 'femme' ? 'selected' : '' }}>Femme</option>
                </select>
                <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                </a>

                <x-primary-button class="ms-4" style="background-color: #007bff; color: #ffffff;">
                    {{ __('Save') }}
                </x-primary-button>

            </div>
    </form>

</div>


@endsection