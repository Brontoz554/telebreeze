<?php

namespace App\Http\Requests;

class EducationRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:user',
            'facility' => 'required|string|between:3,100',
            'profession' => 'required|string|between:3,100',
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
            'user_id.required' => 'идентификатор пользователя обязателен для заполнения',
            'facility.required' => 'Заполните учебное заведение',
            'profession.required' => 'Заполните специальность',
            'user_id.exists' => 'Такой пользователь не существует',
        ];
    }
}
