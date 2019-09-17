<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'gender',
        'birthday'
    ];

    protected $dates = [
        'bithday'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
