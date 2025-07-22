@extends('layouts.app')

@section('content')
<style>
    /* Conteneur général avec border */
    .row.mb-4 {
        max-width: 700px;
        margin: 40px auto;
        padding: 20px 25px;
        background: #f9fafb;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        border: 2px solid #5a9bd5; /* border bleu doux */
        font-family: Arial, sans-serif;
    }

    label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: block;
        font-size: 1.1rem;
    }

    /* Emoji devant le texte du label */
    label::before {
        content: '🎓 ';
    }

    /* Pour différencier les labels */
    #evaluation-select + label::before {
        content: '📝 ';
    }

    select.form-control {
        width: 100%;
        padding: 10px 14px;
        font-size: 1rem;
        border-radius: 8px;
        border: 2px solid #5a9bd5; /* border plus visible */
        background-color: #fff;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    select.form-control:focus {
        outline: none;
        border-color: #3f7ac8;
        box-shadow: 0 0 8px rgba(63, 122, 200, 0.5);
        background-color: #fff;
    }

    #go-to-notes {
        display: block;
        width: 100%;
        max-width: 320px;
        margin: 25px auto 0;
        padding: 12px 0;
        font-size: 1.15rem;
        font-weight: 700;
        color: white;
        background-color: #5a9bd5;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(90, 155, 213, 0.5);
        transition: background-color 0.3s ease;
        user-select: none;
    }
    #go-to-notes:hover {
        background-color: #3f7ac8;
        box-shadow: 0 6px 15px rgba(63, 122, 200, 0.7);
    }

    /* Responsive */
    @media (max-width: 576px) {
        .row.mb-4 {
            padding: 15px 15px;
        }
        #go-to-notes {
            max-width: 100%;
            font-size: 1.05rem;
            padding: 10px 0;
        }
    }
</style>

<div class="row mb-4">
    <div class="col-md-6 mb-3">
        <label for="group-select">Choisir une classe</label>
        <select id="group-select" class="form-control">
            <option value="">-- Classe --</option>
            @foreach($groups as $groupe)
                <option value="{{ $groupe->id }}">{{ $groupe->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="evaluation-select" style="position: relative;">Choisir une évaluation</label>
        <select id="evaluation-select" class="form-control">
            <option value="">-- Évaluation --</option>
            @foreach($evaluations as $eval)
                <option value="{{ $eval->id }}">{{ $eval->nom }}</option>
            @endforeach
        </select>
    </div>
</div>

<button id="go-to-notes">Ajouter les notes</button>

<script>
    document.getElementById('go-to-notes').addEventListener('click', function () {
        const groupId = document.getElementById('group-select').value;
        const evalId = document.getElementById('evaluation-select').value;
        if (groupId && evalId) {
            window.location.href = `/classes/${groupId}/evaluations/${evalId}/notes/create`;
        } else {
            alert('Veuillez sélectionner une classe et une évaluation.');
        }
    });
</script>

@endsection
