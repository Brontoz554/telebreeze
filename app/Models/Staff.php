<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Staff
 * @package App\Models
 *
 * @property string first_name имя
 * @property string middle_name фамилия
 * @property string last_name отчество
 * @property string birthday дата рождения
 * @property integer job_id id должности
 * @property string job_string id должности
 * @property object education
 *
 */
class Staff extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    /**
     * @param $request
     * @return Staff
     */
    public static function confirmNewUser($request): Staff
    {
        return new Staff($request->all());
    }
}
