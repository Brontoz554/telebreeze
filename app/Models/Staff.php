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

    /**
     * @param $request
     * @return mixed
     */
    public static function confirmNewUser($request)
    {
        $user = new Staff();
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->job_string = $request->job_string;
        $user->birthday = $request->birthday;
//        $stuff->job_id = $request->job_id;

        return $user;
    }
}
