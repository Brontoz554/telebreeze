<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Common;
use App\Models\Staff;
use Exception;

/**
 * Class StaffController
 * @package App\Http\Controllers
 */
class StaffController extends Controller
{
    /**
     * @return array
     */
    public function index(): array
    {
        return Common::getAll(Staff::class);
    }

    /**
     * @param Staff $staff
     * @return array
     */
    public function show(Staff $staff): array
    {
        return Common::getOne($staff);
    }

    /**
     * @param StaffRequest $request
     * @return array|Exception
     */
    public function store(StaffRequest $request): array
    {
        return Common::do(Staff::confirmNewUser($request), null, 'save');
    }

    /**
     * @param Staff $staff
     * @param UpdateStaffRequest $request
     * @return array
     */
    public function update(Staff $staff, UpdateStaffRequest $request): array
    {
        return Common::do($staff, $request, 'update');
    }

    /**
     * @param Staff $staff
     * @return array
     */
    public function remove(Staff $staff): array
    {
        return Common::remove($staff);
    }
}
