<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    use HasFactory;

    public function clases() {
        return $this->hasMany(clases::class);
    }

    public function courses() {
        return $this->hasMany(course::class);
    }
    public function students() {
        return $this->hasMany(students::class);
    }


}
