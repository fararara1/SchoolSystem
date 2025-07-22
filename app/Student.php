<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        
        'classe_id',
        'roll_number',
        'gender',
        'phone',
        'dateofbirth',
        'current_address',
        
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function parent() 
    {
        return $this->belongsTo(Parents::class);
    }

    public function notes()
{
    return $this->hasMany(Note::class);
}


    public function attendances() 
    {
        return $this->hasMany(Attendance::class);
    }
    public function groupe()
{
    return $this->belongsTo(Groupe::class);
}

// App\Models\Student.php
public function classe()
{
    return $this->belongsTo(Classe::class, 'classe_id');
}
public function grade()
{
    return $this->belongsTo(Grade::class, 'class_id');  // 'grade_id' doit être dans ta table students
}




}
