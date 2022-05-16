<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Database\Seeders;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Teacher']);
        $role3 = Role::create(['name' => 'Students']);

        Permission::create(['name' =>'admin.home'])->syncRoles([$role1]);

        Permission::create(['name' =>'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' =>'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' =>'admin.users.update'])->syncRoles([$role1]);


        Permission::create(['name' =>'students.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' =>'students.index.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' =>'students.index.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' =>'students.index.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' =>'teachers.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' =>'teachers.index.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' =>'teachers.index.edit'])->syncRoles([$role1]);
        Permission::create(['name' =>'teachers.index.destroy'])->syncRoles([$role1]);

        Permission::create(['name' =>'courses.index'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' =>'courses.index.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' =>'courses.index.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' =>'courses.index.destroy'])->syncRoles([$role1,$role2]);


        $user=new User;
        $user->name = 'Admin';
        $user->email = 'admin@mail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole($role1);

        $user=new User;
        $user->name = 'Teacher1';
        $user->email = 'teacher1@mail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole($role2);

        $user=new User;
        $user->name = 'Teacher2';
        $user->email = 'teacher2@mail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole($role2);

        $user=new User;
        $user->name = 'Teacher3';
        $user->email = 'teacher3@mail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole($role2);

        $user=new User;
        $user->name = 'Student1';
        $user->email = 'student1@mail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole($role3);

        $user=new User;
        $user->name = 'Student2';
        $user->email = 'student2@mail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole($role3);

        $user=new User;
        $user->name = 'Student3';
        $user->email = 'student3@mail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole($role3);

    }
}
