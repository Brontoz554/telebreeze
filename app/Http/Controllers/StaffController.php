<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\Staff;
use Illuminate\Http\Request;

/**
 * Class StaffController
 * @package App\Http\Controllers
 */
class StaffController extends Controller
{
    /**
     * @param StaffRequest $request
     * @return array|\Exception
     */
    public function store(StaffRequest $request)
    {
        $user = Staff::confirmNewUser($request);
        try {
            $user->save();

            return [
                'success' => true,
                'errors' => [],
                'data' => $user,
            ];
        } catch (\Exception $error) {
            return [
                'success' => false,
                'errors' => [
                    $error->getMessage(),
                ],
                'data' => [],
            ];
        }
    }

    public function index()
    {
        return Staff::all();
    }
}
