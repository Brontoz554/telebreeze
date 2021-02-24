<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|between:2,50',
            'middle_name' => 'required|string|between:2,50',
            'last_name' => 'required|string|between:2,50',
            'birthday' => 'required|date_format:d.m.Y|max:20|after:1950-01-01',
            'job_id' => 'exists:states,required_without:job_string',
            'job_string' => 'required_without:job_id'
        ];
    }
}
