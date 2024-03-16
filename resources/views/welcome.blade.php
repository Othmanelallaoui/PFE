<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>kech Service</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="css/dashborard.css">
    
    </head>
    <body class="antialiased">
    @include('layouts.navwel') 

        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen b">
        @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="dashboard">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="login">Sing up</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="register">Sign up</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
               

                <div class="mt-16">
                   
                          <H1>EST FBS </H1>   
                       
                   
                </div>
               
            </div>
        </div>
    </body>
</html>
