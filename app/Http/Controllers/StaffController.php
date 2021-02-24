<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\Common;
use App\Models\Staff;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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
        return Common::do(Staff::confirmNewUser($request), 'save');
    }

    /**
     * @return Staff[]|Collection
     */
    public function index()
    {
        return Staff::all();
    }

    public function update(Staff $object)
    {
        return $object;
    }
}
