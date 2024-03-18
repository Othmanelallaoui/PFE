<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EST RH Service</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/welcmeCss.css">
    <style>

    </style>

</head>

<body class="antialiased">
    @include('layouts.navwel')
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen b ">
        <!--
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 ">
                @auth
                    <a href="{{ url('/dashboard') }}" class="dashboard">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="login">Sign up</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="register">Sign up</a>
                    @endif
                @endauth
            </div>
        @endif
        -->

    </div>
    <section id="Home" style="background-image:url('<?php echo asset('images/backRH.jpg'); ?>'); background-repeat: no-repeat; background-size: cover; box-shadow: inset 900px 0px 800px 70px rgba(0, 0, 0, 0.7);">
       
       <span id="titre">Welcome in <br> our  Web Site RH</span>

    </section>
    
   
    <section id="Contact-us">


        <form action="submit_form.php" method="POST">
        <h2>Contactez-nous</h2>

            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="message">Message :</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>

            <input type="submit" value="Envoyer">
        </form>

    </section>
</body>

</html>