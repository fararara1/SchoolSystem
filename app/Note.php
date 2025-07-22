<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'student_id', 'subject_id', 'evaluation_id', 'note',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}
