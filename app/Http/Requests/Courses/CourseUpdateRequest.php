<?php

namespace App\Http\Requests\Courses;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CourseUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'max:191',
                Rule::unique('courses')->ignore(request()->segment(3))
            ],
            'description' => 'nullable'
        ];
    }
}
