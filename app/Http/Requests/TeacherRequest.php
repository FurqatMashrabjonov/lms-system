<?php

namespace App\Http\Requests;

use App\Enums\UserRole;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->isModerator();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        if (in_array($this->method(), ['PUT', 'PATCH'])){
            $rules = [
                'fullname' => 'min:3|max:100',
                'email' => 'email|unique:users,email',
                'phone' => 'min:10|max:15',
                'address' => 'min:10|max:100',
                'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
                'password' => 'min:6|max:20',
            ];
        }else if ($this->method() == 'POST'){
            $rules = [
                'fullname' => 'required|min:3|max:100',
                'email' => 'required|email',
                'phone' => 'required|min:10|max:15',
                'address' => 'required|min:10|max:100',
                'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
                'password' => 'required|min:6|max:20',
            ];
        }
        return $rules;
    }
}
