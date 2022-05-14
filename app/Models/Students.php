<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    public function schedule() {
        return $this->belongsToMany(Schedule::class,'clases');
    }

    public function teachers() {
        return $this->belongsToMany(Teacher::class,'clases');
    }

    public function courses() {
        return $this->belongsToMany(Courses::class,'clases');
    }
}
