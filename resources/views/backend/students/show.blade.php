@extends('layouts.app')

@section('content')
    <div class="p-6 bg-white rounded shadow">
        <h2 class="text-xl font-bold mb-4">Détails de l'étudiant</h2>

        <p><strong>Nom :</strong> {{ $student->user->name }}</p>
        <p><strong>Email :</strong> {{ $student->user->email }}</p>
    

        <p><strong>Téléphone :</strong> {{ $student->phone }}</p>

        <a href="{{ route('student.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Retour</a>
    </div>
@endsection
