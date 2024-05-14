<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PFE Othman$Wiam</title>
    <!-- Polices -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/welcmeCss.css">
    <style>
        body {
            background-color: rgba(0, 0, 0, 0.3);
        }
    </style>

</head>
<section id="Home" style="background-image:url('<?php echo asset('images/backRH.png'); ?>'); background-repeat: no-repeat; background-size: cover; box-shadow: inset 900px 0px 800px 70px rgba(0, 0, 0, 0.4);">

<body class="antialiased">
    @include('layouts.navwel')

    <span id="titre">Bienvenue sur <br> notre Site Web RH</span>

    </section>


    <!-- <section id="Contact-us">


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

    </section> -->
</body>

</html>
