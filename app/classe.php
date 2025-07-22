<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = ['nom', 'teacher_id'];
    protected $table = 'groupes'; // <-- CORRECTION ICI

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'classe_id');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
