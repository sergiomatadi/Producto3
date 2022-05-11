<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clases extends Model
{
    use HasFactory;

    public function schedules() {
        return $this->hasMany(Schedule::class);
    }

    public function subjects() {
        return $this->hasMany(Subject::class);
    }

    public function teachers() {
        return $this->hasMany(teacher::class);
    }

    public function courses() {
        return $this->hasMany(course::class);
    }

    
}


