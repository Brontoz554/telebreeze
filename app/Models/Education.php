<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int user_id идентификатор пользователя
 * @property int education_id идентификатор образования
 * @property string facility учебное заведение
 * @property string profession специальность
 *
 * Class Education
 * @package App\Models
 */
class Education extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'education_id';

    protected $guarded = [];
}
