<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Common;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * @return array
     */
    public function index(): array
    {
        return [
            'success' => true,
            'error' => [],
            'data' => Post::all(),
        ];
    }

    /**
     * @param PostRequest $request
     * @return array
     */
    public function store(PostRequest $request): array
    {
        return Common::do(Post::confirmNewPost($request), null, 'save');
    }
}
