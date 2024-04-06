@extends('layouts.guest')
@section('title', 'Login')
@section('content')

<style>
    form {
        width: 30%;
        background-color: rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
        border: 2px solid black;
        box-shadow: 10px 1px 100px 0px rgba(0, 0, 0, 0.5);


    }

    .divglo {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 15%;



    }

    .logcreat .creat {
        display: flex;
        justify-content: flex-start;
        position: fixed;
        color: #333;
        padding: 5px ;
        border-radius: 8px;
        border-bottom: 2px solid transparent;
    transition: border-color 0.3s;
    }
    .creat:hover{
        border-color: grey;
    }
  
   h3{
    text-align: center;
    font-size: 25px;
    font-weight: 500;
    margin-bottom: 10px;
   }
</style>
<!-- Session Status -->
<div class="divglo">
    <form method="POST" action="{{ route('login') }}">
        @csrf
<h3>Admin</h3>
        <!-- Email Address -->
        <div>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="email@gmail.com"  :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <input id="password" class="block mt-1 w-full border-2 rounded-md" type="password" name="password"  placeholder="********" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

        </div>


        <div class="logcreat">
         
            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ms-3">
                    {{ __('Connecter') }}
                </x-primary-button>
            </div>
        </div>

    </form>
</div>
@endsection