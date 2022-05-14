<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Students;
use Database\Seeders;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $student=new Students;
        $student->name = 'Student 1';
        $student->username = 'student1';
        $student->pass = '12345678';
        $student->telephone = '625625625';
        $student->nif = '12345678A';
        $student->email = 'student1@mail.com';
        $student->date_registered = '2022-05-13 23:14:01';
        $student->save();

        $student=new Students;
        $student->name = 'Student 2';
        $student->username = 'student2';
        $student->pass = '12345678';
        $student->telephone = '625625625';
        $student->nif = '12345678A';
        $student->email = 'student2@mail.com';
        $student->date_registered = '2022-05-13 23:14:01';
        $student->save();

        $student=new Students;
        $student->name = 'Student 3';
        $student->username = 'student3';
        $student->pass = '12345678';
        $student->telephone = '625625625';
        $student->nif = '12345678A';
        $student->email = 'student3@mail.com';
        $student->date_registered = '2022-05-13 23:14:01';
        $student->save();
    }
}
