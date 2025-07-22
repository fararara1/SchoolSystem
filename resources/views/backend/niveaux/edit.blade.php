@extends('layouts.app')

@section('content')
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f6f8;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
}

.border {
    background: #fff;
    border-radius: 12px;
    padding: 40px 35px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}

.border:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

h3 {
    font-weight: 700;
    color: #2563eb;
    font-size: 1.9rem;
    margin-bottom: 30px;
    text-align: center;
}

.alert-danger {
    border-radius: 10px;
    background-color: #fee2e2;
    color: #b91c1c;
    padding: 15px 20px;
    font-weight: 600;
    margin-bottom: 20px;
}

.alert-danger ul {
    margin-top: 8px;
    padding-left: 20px;
}

.form-label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 1rem;
}

.form-control {
    width: 100%;
    padding: 10px 14px;
    font-size: 1rem;
    border: 2px solid #2563eb;
    border-radius: 8px;
    outline-offset: 2px;
    transition: border-color 0.3s ease;
    box-shadow: 0 1px 3px rgba(37, 99, 235, 0.2);
    font-family: 'Segoe UI', sans-serif;
}

.form-control:focus {
    border-color: #1e40af;
    box-shadow: 0 0 8px rgba(30, 64, 175, 0.4);
}

.btn {
    font-weight: 600;
    border-radius: 8px;
    padding: 10px 25px;
    font-size: 1rem;
    transition: background-color 0.3s ease;
    cursor: pointer;
    font-family: 'Segoe UI', sans-serif;
}

.btn-cancel {
    background-color: #ef4444;
    color: white;
    border: none;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.btn-cancel:hover {
    background-color: #b91c1c;
}

.btn-save {
    background-color: #22c55e;
    color: white;
    border: none;
}

.btn-save:hover {
    background-color: #15803d;
}

.d-flex.justify-content-end {
    margin-top: 30px;
    display: flex;
    justify-content: flex-end;
    gap: 15px;
}
</style>

<div class="container">
    <div class="border">
        <h3>✏️ Modifier le Niveau</h3>

        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <strong>Veuillez corriger les erreurs :</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>🔸 {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('niveaux.update', $niveau->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <label for="nom" class="form-label">Nom du niveau</label>
            <input
                type="text"
                id="nom"
                name="nom"
                class="form-control"
                value="{{ old('nom', $niveau->nom) }}"
                required
            >

            <div class="d-flex justify-content-end">
                <a href="{{ route('niveaux.index') }}" class="btn btn-cancel">
                    ❌ Annuler
                </a>
                <button type="submit" class="btn btn-save">
                    💾 Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
