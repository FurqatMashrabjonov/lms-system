<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonDetailRequest;
use App\Models\LessonDetail;
use Illuminate\Support\Str;


class LessonDetailController extends Controller
{
    public function index($lesson_id): \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    {
        $lesson_details = LessonDetail::query()
            ->where('lesson_id', $lesson_id)
            ->get();
        return success_out($lesson_details);
    }

    public function store(LessonDetailRequest $request): \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    {
        $lesson_detail = new LessonDetail();
        $lesson_detail->lesson_id = $request->input('lesson_id');
        $lesson_detail->title = $request->input('name');

        //Save file to store
        if ($request->hasFile('file')) {
            $lesson_detail->file_path = $request->file('file')->storeAs('lesson_details/' . $lesson_detail->lesson_id, Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension());
        }

        $lesson_detail->save();
        return success_out($lesson_detail);
    }

    public function update(LessonDetailRequest $request, $id): \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    {
        $lesson_detail = LessonDetail::query()->find($id);
        $lesson_detail->name = $request->input('name');

        //Save file to store
        if ($request->hasFile('file')) {
            $lesson_detail->file_path = $request->file('file')->storeAs('lesson_details/' . $lesson_detail->lesson_id, Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension());
        }

        $lesson_detail->save();
        return success_out($lesson_detail);
    }

    public function destroy(LessonDetail $lesson_detail): \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    {
        return success_out($lesson_detail->delete());
    }
}
