<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{  protected $fillable = [
    'nom',
    // Ajoute d'autres champs ici si nécessaire
];
    // Assurez-vous que le modèle est correctement lié à la table 'niveaux' si nécessaire
   
   
    protected $table = 'niveaux'; // Ce n'est peut-être pas nécessaire si la table s'appelle déjà 'niveaux'
    public function student() {
        return $this->hasMany(Etudiant::class);
    }
    
    public function teacher() {
        return $this->hasMany(Professeur::class);
    }
    
    
    


}
