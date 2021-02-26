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
            'first_name.required' => 'Имя обязательно для заполнения',
            'middle_name.required' => 'Фамилия обязательно для заполнения',
            'last_name.required' => 'Отчество обязательно для заполнения',
            'birthday.required' => 'Дата рождения обязательна для заполнения',
            'birthday.date_format' => 'Дата рождения в формате день.месяц.год',
            'birthday.after' => 'Дата не позже 01.01.1950',
            'birthday.before' => 'Дата не раньше ' . date('d.m.Y'),
            'job_string.required_without' => 'Название должности обязательно, в случае если вы не указываете идентификатор должности',
            'job_id.required_without' => 'Идентификатор должности обязателен, в случае если вы не указываете название должности',
            'education.*.facility.required' => 'Заполните учебное заведение',
            'education.*.profession.required' => 'Заполните специальность',
        ];
    }
}
