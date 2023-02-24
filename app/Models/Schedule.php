<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['classroom_name', 'course_name', 'location_name', 'time_description', 'lecturer_nidn', 'academic_year','total_students'];

    public function absents()
    {
        return $this->hasMany(Absent::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_name', 'name');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_name', 'name');
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_nidn', 'nidn');
    }
}
