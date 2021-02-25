<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Http\Requests\updateStaffRequest;
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
     * @param StaffRequest $request
     * @return array|Exception
     */
    public function store(StaffRequest $request)
    {
        return Common::do(Staff::confirmNewUser($request), null, 'save');
    }

    /**
     * @return array
     */
    public function index(): array
    {
        return [
            'success' => true,
            'error' => [],
            'data' => Staff::all(),
        ];
    }

    /**
     * @param Staff $staff
     * @param updateStaffRequest $request
     * @return array
     */
    public function update(Staff $staff, updateStaffRequest $request): array
    {
        return Common::do($staff, $request, 'update');
    }

    /**
     * @param Staff $staff
     * @return array
     */
    public function show(Staff $staff): array
    {
        return [
            'success' => true,
            'errors' => [],
            'data' => $staff
        ];
    }
}
