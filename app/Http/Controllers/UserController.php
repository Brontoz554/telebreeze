<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Common;
use App\Models\User;
use Exception;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @return array
     */
    public function index(): array
    {
        return Common::getAll(User::class);
    }

    /**
     * @param User $user
     * @return array
     */
    public function show(User $user): array
    {
        return Common::getOne($user);
    }

    /**
     * @param UserRequest $request
     * @return array|Exception
     */
    public function store(UserRequest $request): array
    {
        return Common::do(User::confirmNewUser($request), null, 'save');
    }

    /**
     * @param User $user
     * @param UpdateUserRequest $request
     * @return array
     */
    public function update(User $user, UpdateUserRequest $request): array
    {
        return Common::do($user, $request, 'update');
    }

    /**
     * @param User $user
     * @return array
     */
    public function remove(User $user): array
    {
        return Common::do($user, null, 'remove');
    }
}
