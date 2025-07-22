<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['nom', 'groupe_id', 'matiere', 'type', 'bareme', 'date'];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
    
}




