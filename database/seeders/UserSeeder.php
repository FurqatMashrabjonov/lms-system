<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
//                'name' => 'Admin',
                'email' => 'admin@mail.ru',
                'password' => bcrypt('admin'),
                'role' => UserRole::Admin
            ],
            //moderator
            [
//                'name' => 'Moderator',
                'email' => 'moderator@mail.ru',
                'password' => bcrypt('moderator'),
                'role' => UserRole::Moderator
            ],
            //teacher
            [
//                'name' => 'Teacher',
                'email' => 'teacher@mail.ru',
                'password' => bcrypt('teacher'),
                'role' => UserRole::Teacher
            ],
            //student
            [
//                'name' => 'Student',
                'email' => 'student@mail.ru',
                'password' => bcrypt('student'),
                'role' => UserRole::Student
            ]
        ];
        User::query()->insert($users);
    }
}
