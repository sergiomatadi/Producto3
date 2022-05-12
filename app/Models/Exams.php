<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;

    public function clases() {
        return $this->hasMany(clases::class);
    }

    public function students() {
        return $this->hasMany(students::class);
    }
}
