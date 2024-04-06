<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- <link rel="stylesheet" href="css/add.css"> -->
    <link rel="stylesheet" href="css/sidebare.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.7/css/boxicons.min.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wt+oFkl3jd1R5FuZ3vZ6fEuKegkXNtKYz6oA67z2ZrPbcaPnMnoDtN2GK8qfPwv2qwx2j4HhrCt1C2BKDhfj+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            margin: 0;
            padding: 0;
        }
        
        
    </style>
</head>

<body>

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{ asset('images/profile.JPG') }}" alt="{{ Auth::user()->first_name}}">
                </span>

                <div class="text logo-text">
                    <span style="font-size: 14px;" class="name">@if(Auth::user()->sexe == 'homme')

                        <div>{{ 'Mr. ' . Auth::user()->first_name . ' ' . Auth::user()->last_name }}</div>
                        @else
                        <div>{{ 'Mme. ' . Auth::user()->first_name . ' ' . Auth::user()->last_name }}</div>
                        @endif
                    </span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle '></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <!-- <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li> -->

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{route('dashboard')}}">
                            <i class='fas fa-home icon'></i>
                            <span class="text nav-text">Accueil</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('employees.index')}}">
                            <i class='fas fa-users icon'></i>
                            <span class="text nav-text">Gestion Employee</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('absences.index')}}">
                            <i class='fas fa-calendar-minus icon'></i>
                            <span class="text nav-text">Gestion abscence</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('conge.index')}}">
                            <i class='far fa-calendar-alt icon'></i>
                            <span class="text nav-text">Gestion Conge</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('formation.index')}}">
                            <i class='fas fa-graduation-cap icon'></i>
                            <span class="text nav-text">Gestion Formation</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('recruitment.index')}}">
                            <i class='fas fa-user-plus icon'></i>
                            <span class="text nav-text">Recrutment</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="">
                <li class="nav-link">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt icon iconlogout"></i>
                            <span class="text nav-text">Déconnexion</span>

                        </x-responsive-nav-link>
                    </form>
                </li>

                <!-- <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li> -->

            </div>
        </div>

    </nav>

    <main>
      
    </section>
        @yield('content')
    </main>

    <footer>
        <span>Réseaux sociaux :</span>
        <a href="https://www.facebook.com/profile.php?id=100028746217968" class="social-icon"><i class="fab fa-facebook"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/othmanelallaoui/?next=%2F" class="social-icon"><i class="fab fa-instagram"></i></a>
    </footer>


</body>

<script src="js/sidebarjs.js"></script>


</html>