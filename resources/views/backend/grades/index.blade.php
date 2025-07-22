@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Notes</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Étudiant</th>
                <th>Groupe</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grades as $grade)
                <tr>
                    <td>{{ $grade->student->nom ?? 'Inconnu' }}</td>
                    <td>{{ $grade->groupe->nom ?? 'Inconnu' }}</td>
                    <td>{{ $grade->grade }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
