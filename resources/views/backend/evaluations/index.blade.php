@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 960px;
        margin: 40px auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    }

    h1, h2 {
        color: #2c3e50;
        margin-bottom: 20px;
    }

    form {
        background-color: #f4f8fb;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.04);
        margin-bottom: 40px;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
        color: #34495e;
    }

    select,
    input[type="date"],
    input[type="text"] {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        transition: border-color 0.3s ease;
    }

    select:focus,
    input:focus {
        border-color: #3498db;
        outline: none;
    }

    .btn-primary {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 12px 24px;
        font-size: 15px;
        font-weight: 600;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        transform: scale(1.03);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.04);
    }

    th, td {
        padding: 14px 16px;
        border-bottom: 1px solid #e0e0e0;
        text-align: left;
    }

    th {
        background-color: #3498db;
        color: white;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 0.04em;
    }

    tr:nth-child(even) {
        background-color: #f9fcff;
    }

    tr:hover {
        background-color: #e6f4ff;
    }

    @media (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        tr {
            margin-bottom: 15px;
        }

        th {
            display: none;
        }

        td {
            padding: 10px;
            position: relative;
        }

        td::before {
            content: attr(data-label);
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
            color: #7f8c8d;
        }
    }
</style>

<div class="container">
    <h1>📊 Évaluations</h1>

    <form action="{{ route('evaluations.store') }}" method="POST">
        @csrf

        <label for="groupe">Groupe</label>
        <select id="groupe" name="groupe_id" required>
            <option value="">-- Sélectionnez un groupe --</option>
            @foreach ($groupes as $groupe)
                <option value="{{ $groupe->id }}">{{ $groupe->name }}</option>
            @endforeach
        </select>

        <label for="nom">Nom de l'évaluation</label>
        <select id="nom" name="nom" required>
            <option value="">-- Sélectionnez un nom --</option>
            @foreach($evaluations as $evaluation)
                <option value="{{ $evaluation->nom }}">{{ $evaluation->nom }}</option>
            @endforeach
        </select>

        <label for="type">Type</label>
        <select id="type" name="type" required>
            <option value="">-- Sélectionnez un type --</option>
            <option value="Oral">Oral</option>
            <option value="Écrit">Écrit</option>
            <option value="Pratique">Pratique</option>
        </select>

        <label for="date">Date</label>
        <input type="date" id="date" name="date" required>

        <label for="bareme">Barème</label>
        <select id="bareme" name="bareme" required>
            <option value="">-- Sélectionnez un barème --</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>

        <label for="matiere">Matière</label>
        <input type="text" id="matiere" name="matiere" required>

        <button type="submit" class="btn-primary">➕ Ajouter une évaluation</button>
    </form>

    <h2>📄 Liste des évaluations</h2>
    <table>
        <thead>
            <tr>
                <th>Groupe</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Date</th>
                <th>Barème</th>
                <th>Matière</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation->groupe ? $evaluation->groupe->name : 'N/A' }}</td>
                    <td>{{ $evaluation->nom }}</td>
                    <td>{{ $evaluation->type }}</td>
                    <td>{{ \Carbon\Carbon::parse($evaluation->date)->format('d/m/Y') }}</td>
                    <td>{{ $evaluation->bareme }}</td>
                    <td>{{ $evaluation->matiere }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center; color:#888;">Aucune évaluation trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
