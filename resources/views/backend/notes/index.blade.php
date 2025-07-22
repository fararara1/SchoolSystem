@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-10">
    <!-- Titre -->
    <h2 class="text-3xl font-bold text-blue-800 text-center mb-8">Liste des notes (Lecture seule pour Admin)</h2>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="mb-6 px-6 py-4 bg-green-100 text-green-800 rounded-md shadow">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tableau des notes -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-blue-200">
        <table class="min-w-full table-auto divide-y divide-blue-200">
            <thead class="bg-blue-900 text-white text-sm uppercase font-semibold">
                <tr>
                    <th class="px-6 py-4 text-left">Étudiant</th>
                    <th class="px-6 py-4 text-left">Note</th>
                    <th class="px-6 py-4 text-left">Évaluation</th>
                    <th class="px-6 py-4 text-left">Matière</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-100 text-sm text-gray-800">
                @forelse ($notes as $note)
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="px-6 py-4 font-medium">
                            {{ $note->student->user->name ?? 'Étudiant supprimé' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $note->note }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $note->evaluation->nom ?? 'Évaluation supprimée' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $note->evaluation->matiere ?? 'Matière non définie' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 italic">
                            Aucune note disponible.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
