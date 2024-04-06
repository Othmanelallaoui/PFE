<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
  
  .link-user1 button{
    border-radius: 8px;
    background-color: rgba(0, 0,0, 0.6);
    color: white;
    padding: 8px 10px;}

    .link-user1 button:hover{
   cursor: pointer;


  }
   .link-user1 {
    float: right;
    margin-right: 30px;
    text-decoration: none;
    border-radius: 8px;
    margin-top: -8px;
    margin-bottom: -8px;
}
</style>
<div class="navigation-menu">
    <div class="items-center">

        <div class="icon">
            <a href="{{route('welcome')}}">
                <i class="fas fa-house nav-icon"></i>
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="contentnav">
            <a href="{{route('welcome')}}" class="nav-link">Accueil</a>
            <a href="{{ route('offre_emploi') }}" class="nav-link">Offre d'emploi</a>
            <a href="{{ route('demande_conge') }}" class="nav-link">Demande de congé</a>
            <a href="#Contact-us" class="nav-link">Contactez-nous</a>
            @guest('employee')
            @guest
            <a href="{{ route('login') }}" class="link-user">Administration</a>
            <a href="{{ route('employee.login') }}" class="link-user">Se connecter</a>
            @endguest
            @endguest

            @auth
            <a href="{{ route('dashboard') }}" class="link-user">Espace d'administration</a>
            @else
            @auth('employee')

            @if(Auth::guard('employee')->check())
            <span class="link-user1">
                <form method="POST" action="{{ route('employee.logout') }}">
                    @csrf
                    <button type="submit">
                        Se déconnecter
                    </button>
                </form>
            </span>
            @php
            $user = Auth::guard('employee')->user();
            $title = ($user->sexe == 'homme') ? 'Mr.' : 'Mme.';
            @endphp
            <span class="link-user-name">{{ $title }} {{ $user->last_name }} {{ $user->first_name }}</span>

            @endif
            @endauth
            @endauth



        </div>
    </div>
</div>