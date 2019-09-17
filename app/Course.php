<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments', 'student_id', 'course_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
