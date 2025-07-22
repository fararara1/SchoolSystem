<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Niveau;
class NiveauController extends Controller
{
    public function index()
    {
        $niveaux = Niveau::all();
        return view('backend.niveaux.index', compact('niveaux'));
    }
    
    public function create()
    {
        return view('backend.niveaux.create');
    }
    
    public function edit($id)
    {
        $niveau = Niveau::findOrFail($id);
        return view('backend.niveaux.edit', compact('niveau'));
    }
    // Méthode pour enregistrer un nouveau niveau
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            // Ajoute ici d'autres règles de validation si nécessaire
        ]);

        // Créer un nouveau niveau
        Niveau::create([
            'nom' => $request->nom,
            // Ajoute ici d'autres champs si nécessaire
        ]);

        // Rediriger vers la page des niveaux avec un message de succès
        return redirect()->route('niveaux.index')->with('success', 'Niveau créé avec succès !');
    }
    public function update(Request $request, $id)
    {
        // Trouver le niveau par son ID
        $niveau = Niveau::findOrFail($id);

        // Valider les données envoyées (si nécessaire)
        $request->validate([
            'nom' => 'required|string|max:255',
            // Ajoute d'autres règles de validation si nécessaire
        ]);

        // Mettre à jour le niveau avec les données envoyées
        $niveau->update([
            'nom' => $request->input('nom'),
        ]);

        // Rediriger vers une page ou retourner une réponse
        return redirect()->route('niveaux.index')->with('success', 'Niveau mis à jour avec succès');
    }
    
}

    
