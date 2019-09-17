<?php

namespace App\Http\Requests\Students;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => [
                'required',
                'email',
                'max:191',
                Rule::unique('students')->ignore(request()->segment(3))
            ],
            'gender' => 'nullable|in:male,female',
            'birthday' => 'required|date'
        ];
    }
}
