<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int job_id идентификатор
 * @property string job_name название должности
 *
 * Class Job
 * @package App\Models
 */
class Job extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['job_id'];

    protected $table = 'job';

    protected $primaryKey = 'job_id';

    /**
     * @param $request
     * @return Job
     */
    public static function confirmNewPost($request): Job
    {
        return new Job($request->all());
    }
}
