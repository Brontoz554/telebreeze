<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
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
class User extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    protected $table = 'user';

    /**
     * @param $request
     * @return User
     */
    public static function confirmNewUser($request): User
    {
        return new User($request->all());
    }
}
