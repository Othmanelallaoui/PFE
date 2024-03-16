<x-app-layout>
    <!-- Entête de la page -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des Congés
        </h2>
    </x-slot>

    <!-- Contenu de la page -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Formulaire pour soumettre une demande de congé -->
                    <form method="POST" action="">
                        @csrf

                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Date de début</label>
                            <input type="date" name="start_date" id="start_date" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">Date de fin</label>
                            <input type="date" name="end_date" id="end_date" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="reason" class="block text-sm font-medium text-gray-700">Raison du congé</label>
                            <textarea name="reason" id="reason" rows="3" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required></textarea>
                        </div>

                        <div>
                            <button type="submit" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>