<?php

namespace App\Http\Requests;

class JobRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'job_name' => 'required|between:5,70|unique:job'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'job_name.required' => 'заполните название должности'
        ];
    }
}
