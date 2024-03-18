<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    
</style>
<div class="navigation-menu">
    <div class="items-center">

        <div class="icon">
            <a href="{{route('welcome')}}">
                <i class="fas fa-house nav-icon"></i>
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="">
        <a href="{{route('welcome')}}"  class="nav-link">Accueil</a>
            <a href="{{ route('offre_emploi') }}" class="nav-link">Offre d'emploi</a>
            <a href="#About" class="nav-link">À propos</a>
            <a href="#Contact-us" class="nav-link">Contactez-nous</a>
            @auth
            <a href="{{ url('/dashboard') }}" class="link-user">Home</a>

            @else
            <a href="{{ route('login') }}" class=" link-user"> Administrateur</a>

           
                   

                        
                    @endauth

        </div>
    </div>
</div>