<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function absents(){
        return $this->hasMany(Absent::class);
    }

    public function course(){
        return $this->belongsTo(Course::class,'course_name','name');
    }
}
