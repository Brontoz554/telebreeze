<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class User
 * @package App\Models
 *
 * @property integer user_id идентификатор
 * @property string first_name имя
 * @property string middle_name фамилия
 * @property string last_name отчество
 * @property string birthday дата рождения
 * @property integer job_id id должности
 * @property string job_string id должности
 * @property object education образование
 *
 */
class User extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    protected $table = 'user';

    protected $primaryKey = 'user_id';

    /**
     * @param $request
     * @return User
     */
    public static function confirmNewUser($request): User
    {
        return new User($request->all());
    }

    /**
     * @return HasOne
     */
    public function job(): HasOne
    {
        return $this->hasOne(Job::class);
    }

    /**
     * @return HasMany
     */
    public function education(): HasMany
    {
        return $this->hasMany(Education::class, 'user_id', 'user_id');
    }
}
