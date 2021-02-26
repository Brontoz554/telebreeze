<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => 'integer|exists:user',
            'facility' => 'string|between:3,100',
            'profession' => 'string|between:3,100',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'profession.between' => 'Длинна от 3 до 100 символов',
            'facility.between' => 'Длинна от 3 до 100 символов',
            'user_id.exists' => 'Такой пользователь не существует',
        ];
    }
}
