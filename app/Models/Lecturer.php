<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nidn', 'name'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'lecturer_nidn', 'nidn');
    }
}
