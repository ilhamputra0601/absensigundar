<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['classroom_name', 'npm', 'name'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_name', 'name');
    }
    public function absents()
    {
        return $this->hasMany(Absent::class);
    }
}
