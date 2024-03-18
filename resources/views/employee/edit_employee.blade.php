@extends('layouts.app')
@section('title', 'Edit Employee')
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

    form {
        margin-top: 25px;
        width: 45%;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 12px;
    }
    
</style>
<link rel="stylesheet" href="css/sidebare.css">

<div class="divform">
    <form method="POST" action="{{ route('employees.update',['employee'=> $employee->id]) }}">
        @csrf
        @method('PUT')
        <!-- first name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="$employee->first_name" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>
        <!--last Name -->

        <div class="mt-2">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="$employee->last_name" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>


        <!-- Email Address -->
        <div class="mt-2">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$employee->email" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!--phone -->
        <div class="mt-2">
            <x-input-label for="phone" :value="__('Phone')" />
            <div class="flex items-center">
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$employee->phone" required autofocus autocomplete="phone" />
            </div>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>


        <!--sexe -->

        <div class="mt-2">
            <x-input-label for="sexe" :value="('Sexe')" />
            <select id="sexe" name="sexe" class="block mt-1 w-full" required autofocus autocomplete="sexe">
                <option value="homme" {{ $employee->sexe == 'homme' ? 'selected' : '' }}>Homme</option>
                <option value="femme" {{  $employee->sexe == 'femme' ? 'selected' : '' }}>Femme</option>
            </select>
            <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
        </div>

        <!-- city -->
        <div class="mt-2">
            <x-input-label for="city" :value="__('City')" />
            <select id="city" name="city" class="block mt-1 w-full" required>
                <option value="">Sélectionnez une ville</option>
                @foreach($moroccanCities as $city)
                <option value="{{ $city }}" {{ $employee->city == $city ? 'selected' : '' }}>{{ $city }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>




        <x-primary-button class="ms-4" style="background-color: blue; color:#ffffff">
            {{ __('Save Editing') }}
        </x-primary-button>
</div>
</form>

</div>


@endsection