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
            'birthday' => 'date_format:d.m.Y|max:20|after:1950-01-01',
            'job_id' => 'exists:states,_without:job_string',
            'job_string' => 'without:job_id'
        ];
    }
}
