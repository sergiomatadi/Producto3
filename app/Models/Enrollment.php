<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $casts = [
        'status' => 'boolean'
    ];

    public function schedules() {
        return $this->hasMany(Schedule::class);
    }

    public function subjects() {
        return $this->hasMany(Subject::class);
    }

    public function teachers() {
        return $this->hasMany(teachers::class);
    }
}
