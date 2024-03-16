<link rel="stylesheet" href="css/navbar.css">



<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">


               


                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('employees.index')" :active="request()->routeIs('employees.index')">
                        {{ __('G.Employee') }}
                    </x-nav-link>
                    <x-nav-link :href="route('absences.index')" :active="request()->routeIs('absences.index')">
                        {{ __('G.Absence') }}
                    </x-nav-link>
                    <x-nav-link :href="route('conge.index')" :active="request()->routeIs('conge.index')">
                        {{ __('G.Conge') }}
                    </x-nav-link>
                    <x-nav-link :href="route('formation.index')" :active="request()->routeIs('formation.index')">
                        {{ __('G.Formation') }}
                    </x-nav-link>
                    <x-nav-link :href="route('recruitment.index')" :active="request()->routeIs('recruitment.index')">
                        {{ __('Recruitment') }}
                    </x-nav-link>
                </div>







            </div>
        </div>








    </div>
</nav>