<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $fillable = [
        'student_id',
        'absent',
        'date_day',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
