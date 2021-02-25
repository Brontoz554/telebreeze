<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    /**
     * @param $request
     * @return Post
     */
    public static function confirmNewPost($request): Post
    {
        return new Post($request->all());
    }
}
