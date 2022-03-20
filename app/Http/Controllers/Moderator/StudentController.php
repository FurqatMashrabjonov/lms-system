<?php

namespace App\Http\Controllers\Moderator;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Traits\CreateUser;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    use CreateUser;

    public function index()
    {
        return Inertia::render('Moderator/Students/Index', [
            'students' => Student::paginate()
        ]);
    }

    public function create()
    {
        return Inertia::render('Moderator/Students/Create');
    }

    public function store(StudentRequest $request)
    {
        $user = CreateUser::create(array_merge($request->only(['email', 'password']), ['role' => UserRole::Student]));
        return $user;
    }

}
