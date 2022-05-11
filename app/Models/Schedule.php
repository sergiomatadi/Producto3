<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function students() {
        return $this->belongsToMany(students::class,'clases');
    }

    public function teachers() {
        return $this->belongsToMany(teachers::class,'clases');
    }

    public function courses() {
        return $this->belongsToMany(courses::class,'clases');
    }


}
