<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public function students(){
        return $this->hasMany(Student::class,'classroom_name','name');
    }

    public function major(){
        return $this->belongsTo(Major::class);
    }

    public function schedules(){
        return $this->hasMany(Schedule::class,'classroom_name','name');
    }
}
