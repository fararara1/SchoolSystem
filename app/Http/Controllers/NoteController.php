<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Evaluation;
use App\Note;
use App\Student;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function create(Classe $classe, Evaluation $evaluation)
{
    $etudiants = Student::where('classe_id', $classe->id)->with('user')->get();



    $notes = Note::with(['student.user', 'evaluation'])
                 ->where('evaluation_id', $evaluation->id)
                 ->whereIn('student_id', $etudiants->pluck('id'))
                 ->get()
                 ->keyBy('student_id');

    return view('backend.notes.create', compact('classe', 'evaluation', 'etudiants', 'notes'));
}


    


   // Dans NoteController@store

public function store(Request $request, Classe $classe, Evaluation $evaluation)
{
    $validated = $request->validate([
        'notes' => 'required|array',
        'notes.*' => 'nullable|numeric|min:0|max:20',
    ]);

    foreach ($validated['notes'] as $studentId => $noteValue) {
        if ($noteValue !== null) {
            Note::updateOrCreate(
                [
                    'evaluation_id' => $evaluation->id,
                    'student_id' => $studentId,
                ],
                [
                    'note' => $noteValue,
                    // suppression de 'subject_id'
                ]
            );
        }
    }

    return redirect()->route('notes.create', ['classe' => $classe->id, 'evaluation' => $evaluation->id])
                     ->with('success', 'Notes enregistrées avec succès.');
}
public function index()
{
    $notes = Note::with(['student', 'subject'])->get();
    return view('backend.notes.index', compact('notes'));
}




    
}
