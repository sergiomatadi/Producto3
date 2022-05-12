<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $casts = [
        'active' => 'boolean'
    ];
    protected $dates = ['date_start', 'date_end'];

    public function subjects() {
        return $this->hasMany(Subject::class);
    }

    public function students() {
        return $this->belongsToMany(students::class,'enrollments');
        return $this->belongsToMany(students::class,'clases');
    }

    public function teachers() {
        return $this->belongsToMany(teachers::class,'clases');
    }

    public function schedules() {
        return $this->belongsToMany(schedules::class,'clases');
    }


}
