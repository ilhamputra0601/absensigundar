<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absenttype extends Model
{
    use HasFactory;

    public function absents(){
        return $this->hasMany(Absent::class);
    }
}
