<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['schedule_id', 'student_id', 'absenttype_id', 'week'];

    public function absenttype()
    {
        return $this->belongsTo(Absenttype::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
