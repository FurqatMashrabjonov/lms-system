<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->isTeacher();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lesson_id' => 'required|exists:lessons,id',
            'name' => 'required|string|max:255',
            'file' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar',
        ];
    }
}
