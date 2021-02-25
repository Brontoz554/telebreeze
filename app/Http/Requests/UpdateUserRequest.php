<?php

namespace App\Http\Requests;

class UpdateUserRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'string|between:2,50',
            'middle_name' => 'string|between:2,50',
            'last_name' => 'string|between:2,50',
            'birthday' => 'max:20|date_format:d.m.Y|after:01.01.1950|before:today',
            'job_id' => 'required_without:job_string|exists:job',
            'job_string' => 'required_without:job_id'
        ];
    }
}
