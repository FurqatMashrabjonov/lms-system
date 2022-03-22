<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupStudentRequest;
use App\Models\GroupStudent;
use Illuminate\Http\Request;

class GroupStudentController extends Controller
{
    public function index(): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $groupStudents = GroupStudent::query()
        ->with(['group', 'student'])
            ->get();
        return success_out($groupStudents);
    }

    public function store(GroupStudentRequest $request): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $groupStudent = GroupStudent::query()->create($request->all());
        return success_out($groupStudent);
    }

    public function show(GroupStudent $groupStudent): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return success_out($groupStudent->load('group', 'student'));
    }

    public function update(GroupStudentRequest $request, GroupStudent $groupStudent): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $groupStudent->update($request->all());
        return success_out($groupStudent->load('group', 'student'));
    }

    public function delete(GroupStudent $groupStudent): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return success_out($groupStudent->delete());
    }

}
