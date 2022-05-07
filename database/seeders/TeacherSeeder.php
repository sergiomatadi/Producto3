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
        $teacher->name = 'Sergio';
        $teacher->surname = 'Alvarez';
        $teacher->telephone = '625625625';
        $teacher->nif = '12345678A';
        $teacher->email = 'ser@mail.com';
        $teacher->save();

        $teacher=new Teachers;
        $teacher->name = 'Denisse';
        $teacher->surname = 'Gonzalez';
        $teacher->telephone = '625625625';
        $teacher->nif = '12345678A';
        $teacher->email = 'giovanna71@example.com';
        $teacher->save();

        $teacher=new Teachers;
        $teacher->name = 'Luciano';
        $teacher->surname = 'Hayer';
        $teacher->telephone = '625625625';
        $teacher->nif = '12345678A';
        $teacher->email = 'roconner@example.com';
        $teacher->save();




    }
}
