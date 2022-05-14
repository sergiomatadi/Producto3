<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teachers;
use Database\Seeders;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $teacher=new Teachers;
        $teacher->name = 'Teacher';
        $teacher->surname = '1';
        $teacher->telephone = '625625625';
        $teacher->nif = '12345678A';
        $teacher->email = 'teacher1@mail.com';
        $teacher->save();

        $teacher=new Teachers;
        $teacher->name = 'Teacher';
        $teacher->surname = '2';
        $teacher->telephone = '625625625';
        $teacher->nif = '12345678A';
        $teacher->email = 'teacher2@mail.com';
        $teacher->save();

        $teacher=new Teachers;
        $teacher->name = 'Teacher';
        $teacher->surname = '3';
        $teacher->telephone = '625625625';
        $teacher->nif = '12345678A';
        $teacher->email = 'teacher3@mail.com';
        $teacher->save();
    }
}
