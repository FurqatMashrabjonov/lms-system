<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
       return success_out(Lesson::query()->with(['teacher', 'group', 'subject', 'semester'])->paginate());
    }

    public function store(LessonRequest $request): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $lesson = Lesson::create($request->all());
        return success_out($lesson);
    }

    public function show(Lesson $lesson): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return success_out($lesson->load(['teacher', 'group', 'subject', 'semester']));
    }

    public function update(LessonRequest $request, Lesson $lesson): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $lesson->update($request->all());
        return success_out($lesson->load(['teacher', 'group', 'subject', 'semester']));
    }

    public function destroy(Lesson $lesson): \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return success_out($lesson->delete());
    }

}
