@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f9fafb;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h3 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1.5rem;
    }

    .container-notes {
        max-width: 800px;
        margin: auto;
        background: white;
        padding: 2rem;
        border-radius: 0.75rem;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1.5rem;
    }

    .table th, .table td {
        padding: 0.75rem;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .table th {
        background-color: #f1f5f9;
        color: #2d3748;
        font-weight: bold;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .alert {
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }

    .alert-success {
        background-color: #d1e7dd;
        color: #0f5132;
    }

    .alert-warning {
        background-color: #fff3cd;
        color: #664d03;
    }

    input[type="number"] {
        border: 1px solid #ccc;
        padding: 0.4rem 0.6rem;
        border-radius: 0.5rem;
        width: 80px;
        font-size: 1rem;
    }

    .btn {
        display: inline-block;
        padding: 0.6rem 1.2rem;
        font-size: 1rem;
        border-radius: 0.5rem;
        cursor: pointer;
        border: none;
        text-align: center;
    }

    .btn-primary {
        background-color: #3490dc;
        color: white;
    }

    .btn-primary:hover {
        background-color: #2779bd;
    }
</style>

<h3>Ajouter / Modifier les notes pour la classe {{ $classe->name }} - Évaluation {{ $evaluation->nom }}</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Formulaire de saisie --}}
<form action="{{ route('notes.store', ['classe' => $classe->id, 'evaluation' => $evaluation->id]) }}" method="POST">
    @csrf
    <table class="table">
        <thead>
            <tr>
                <th>Étudiant</th>
                <th>Note (0-20)</th>
            </tr>
        </thead>
        <tbody>
        @foreach($etudiants as $etudiant)
<tr>
    <td>{{ $etudiant->user->name ?? 'Nom indisponible' }}</td>
    <td>
        <input type="number" name="notes[{{ $etudiant->id }}]" min="0" max="20"
            value="{{ $notes->has($etudiant->id) ? $notes[$etudiant->id]->note : '' }}"
            class="border px-2 py-1 rounded w-24" required>
    </td>
</tr>
@endforeach
@if($etudiants->isEmpty())
    <div class="alert alert-warning">Aucun étudiant trouvé pour cette classe.</div>
@else
    {{-- Affichage du formulaire --}}
@endif


        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Enregistrer les notes</button>
</form>

{{-- Tableau de résultats des notes (affiché après validation ou déjà présent) --}}
@if($notes->count() > 0)
    <hr>
    <h4 class="mt-4">Notes enregistrées</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Étudiant</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->user->name ?? 'Nom indisponible' }}</td>
                    <td>
                        {{ $notes->has($etudiant->id) ? $notes[$etudiant->id]->note : '—' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
