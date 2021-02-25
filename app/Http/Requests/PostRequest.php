<?php

namespace App\Http\Requests;

class PostRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'post_name' => 'required|between:5,70'
        ];
    }
}
