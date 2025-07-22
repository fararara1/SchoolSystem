<?php

namespace App\Http\Controllers;

use App\Groupe;
use App\Student;
use App\Grade;
use App\Evaluation;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    { 
        $groups = Groupe::all();
        $evaluations = Evaluation::all(); // ou filtré par matière ou prof si nécessaire

        return view('backend.groups.index', compact('groups', 'evaluations'));
    
    }

    

    public function storeNotes(Request $request, $id)
    {
        foreach ($request->grades as $student_id => $note) {
            Grade::create([
                'student_id' => $student_id,
                'note' => $note,
                'group_id' => $id
            ]);
        }

        return redirect()->back()->with('success', 'Notes enregistrées avec succès.');
    }

    public function showStudents($id)
    {
        $groupe = Groupe::with('students')->findOrFail($id);
        return view('backend.groups.students', compact('groupe'));
    }

    public function show($id)
    {
        $groupe = Groupe::with('students')->findOrFail($id);
        return view('backend.groups.show', compact('groupe'));
    }
}
