@extends('layouts.app')

@section('content')
<style>
    /* Conteneur principal */
.container {
    max-width: 700px;
    margin: 40px auto;
    padding: 25px 30px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Titre */
h2 {
    text-align: center;
    color: #34495e;
    margin-bottom: 30px;
    font-weight: 700;
    font-size: 2rem;
}

/* Alert succès */
.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: 15px 20px;
    border-radius: 5px;
    margin-bottom: 20px;
    font-weight: 600;
}

/* Tableau */
table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 12px;
    margin-bottom: 30px;
}

/* En-têtes */
thead th {
    background-color: #2980b9;
    color: white;
    padding: 12px 15px;
    text-align: left;
    border-radius: 8px 8px 0 0;
    font-weight: 600;
}

/* Lignes du tableau */
tbody tr {
    background: #fdfdfd;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    transition: background 0.3s ease;
}

tbody tr:hover {
    background-color: #ecf0f1;
}

/* Cellules */
td {
    padding: 12px 15px;
    vertical-align: middle;
}

/* Texte note */
td:last-child {
    font-weight: 600;
    color: #2c3e50;
}

/* Responsive */
@media(max-width: 600px) {
    .container {
        padding: 20px;
    }
}
</style>
<div class="container mt-4">
    <h2>Résultats pour {{ $classe->nom }} - {{ $evaluation->nom }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Étudiant</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
            <tr>
                <td>{{ $note->student->user->name }}</td>
                <td>{{ $note->note }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
