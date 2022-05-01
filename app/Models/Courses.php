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


}
