<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use App\Http\Requests\SemesterRequest;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index(): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return success_out(Semester::paginate());
    }

    public function show(Semester $semester): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return success_out($semester->load('lessons'));
    }

    public function store(SemesterRequest $request): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $semester = Semester::create($request->all());

        return success_out($semester);
    }

    public function update(SemesterRequest $request, Semester $semester): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $semester->update($request->all());

        return success_out($semester);
    }

    public function delete(Semester $semester): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return success_out($semester->delete());
    }

}
