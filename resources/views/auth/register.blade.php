@extends('layouts.guest')
@section('title', 'Register')
@section('content')
<style>
   form{
    width: 38%;
    
   }
   .divglo{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 2%;
   }
</style>
<div class="divglo">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- first name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" type="text"  class="block mt-1 w-full" name="first_name" :value="old('first_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!--last Name -->

        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

         <!--phone -->

         <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div>
        <x-input-label for="sexe" :value="__('Sexe')" />
        <select id="sexe" name="sexe" class="block mt-1 w-full" required autofocus autocomplete="sexe">
        <option value="homme" {{ old('sexe') == 'homme' ? 'selected' : '' }}>Homme</option>
        <option value="femme" {{ old('sexe') == 'femme' ? 'selected' : '' }}>Femme</option>
           </select>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    </div>
@endsection