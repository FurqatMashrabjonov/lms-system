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

    public function index(): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
       return success_out(Student::paginate());
    }

    public function show(Student $student): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return success_out($student);
    }

    public function store(StudentRequest $request): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $user = CreateUser::create(array_merge($request->only(['email', 'password']), ['role' => UserRole::Student]));

        $student = $user->student()->create($request->only(['fullname', 'phone', 'address']))->load('user');
        return success_out($student);
    }

    public function delete(Student $student): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return success_out($student->delete());
    }

    public function update(StudentRequest $request, Student $student): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $student->update($request->only(['fullname', 'phone', 'address']));
        return success_out($student);
    }

}
