<?php

namespace App\Http\Requests\Enrollments;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EnrollmentUpdateRequest extends FormRequest
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
            'course_id' => [
                'required',
                'exists:courses,id',
                Rule::unique('enrollments')
                    ->ignore(request()->segment(3))
                    ->where('student_id', request()->get('student_id'))
                    ->where('course_id', request()->get('course_id'))
            ],
            'student_id' => 'required|exists:students,id'
        ];
    }

    public function messages()
    {
        return [
            'course_id.unique' => 'The course id and student id has already been taken.'
        ];
    }
}
