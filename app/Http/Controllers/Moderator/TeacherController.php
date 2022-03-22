<?php

namespace App\Http\Controllers\moderator;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\TeacherRequest;
use App\Http\Traits\CreateUser;
use App\Models\Teacher;

class TeacherController extends Controller
{
    use CreateUser;

    public function index(): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return success_out(Teacher::all());
    }

    public function show(Teacher $teacher): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return success_out($teacher);
    }

    public function store(TeacherRequest $request): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $user = CreateUser::create(array_merge($request->only(['email', 'password']), ['role' => UserRole::Teacher]));

        $teacher = $user->teacher()->create($request->only(['fullname', 'phone', 'address']))->load('user');
        return success_out($teacher);
    }

    public function delete(Teacher $teacher): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return success_out($teacher->delete());
    }

    public function update(TeacherRequest $request, Teacher $teacher): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $teacher->update($request->only(['fullname', 'phone', 'address']));
        return success_out($teacher);
    }
}
