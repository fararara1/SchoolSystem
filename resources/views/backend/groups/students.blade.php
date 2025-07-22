@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter les notes pour le groupe : {{ $groupe->name }}</h2>

    @if($group->students->count())
        <form method="POST" action="{{ route('grades.store') }}">
            @csrf
            <input type="hidden" name="groupe_id" value="{{ $groupe->id }}">

            <table class="table">
                <thead>
                    <tr>
                        <th>Étudiant</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($group->students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>
                                <input type="hidden" name="student_ids[]" value="{{ $student->id }}">
                                <input type="number" name="grades[]" class="form-control" required step="0.01" min="0" max="20">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Enregistrer les notes</button>
        </form>
    @else
        <p>Aucun étudiant dans ce groupe.</p>
    @endif
</div>
@endsection
