<?php

namespace App\Http\Controllers;

use App\Evaluation;
use App\Groupe;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
{
    // On charge les évaluations avec leurs groupes pour éviter N+1 queries
    $evaluations = Evaluation::with('groupe')->orderBy('date', 'desc')->get();

    $groupes = Groupe::all();

    return view('backend.evaluations.index', compact('evaluations', 'groupes'));
}

    public function store(Request $request)
{
    $request->validate([
        'groupe_id' => 'required|exists:groupes,id',
        'nom' => 'required|string',
        'type' => 'required|string',
        'date' => 'required|date',
        'bareme' => 'required|numeric',
        'matiere' => 'required|string',
    ]);
    
    

    Evaluation::create([
        'nom' => $request->nom,
        'groupe_id' => $request->groupe_id,
        'matiere' => $request->matiere,
        'type' => $request->type,
        'bareme' => $request->bareme,
        'date' => $request->date,
    ]);
    

    return redirect()->back()->with('success', 'Évaluation ajoutée avec succès.');
}

}

