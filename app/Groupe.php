<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $fillable = ['teacher_id', 'name'];
    
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'groupe_id'); // il faut préciser la clé étrangère si différente
    }
}
