<?php

namespace App\Http\Traits;

use App\Models\User;

trait CreateUser
{



    /**
     * Create a new user instance after a valid registration.
     * @return User
     */
    static function create($data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
        ]);
    }
}
