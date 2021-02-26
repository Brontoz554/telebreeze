<?php

namespace App\Http\Requests;

class UserRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|between:2,50',
            'middle_name' => 'required|string|between:2,50',
            'last_name' => 'required|string|between:2,50',
            'birthday' => 'required|max:20|date_format:d.m.Y|after:01.01.1950|before:today',
            'job_string' => 'required_without:job_id',
            'job_id' => 'required_without:job_string|exists:job',
            'education_id' => 'integer',
            'education.*.facility' => 'required|string',
            'education.*.profession' => 'required|string',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'required' => 'field can not be empty'
        ];
    }
}
