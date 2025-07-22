<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Student;
use App\Evaluation;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClasseController extends Controller
{
    public function index()
    {
        $teacherId = Auth::user()->teacher?->id;
        $classes = Classe::where('teacher_id', $teacherId)->get();
        $allClasses = Classe::all();
        $evaluations = Evaluation::with('classe')->get();

        return view('backend.evaluations.index', compact('allClasses', 'evaluations'));
    }

    public function getStudentsEvaluations($id)
    {
        $students = Student::where('classe_id', $id)->get();
        $evaluations = Evaluation::where('classe_id', $id)->get();

        return response()->json([
            'students' => $students,
            'evaluations' => $evaluations,
        ]);
    }

    public function storeNotes(Request $request)
    {
        foreach ($request->notes as $studentId => $notes) {
            foreach ($notes as $evaluationId => $value) {
                Note::updateOrCreate(
                    [
                        'student_id' => $studentId,
                        'evaluation_id' => $evaluationId,
                    ],
                    ['value' => $value]
                );
            }
        }

        return redirect()->route('classes.index')->with('success', 'Notes enregistrées avec succès.');
    }
}
