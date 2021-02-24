<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use Illuminate\Http\Request;

/**
 * Class StaffController
 * @package App\Http\Controllers
 */
class StaffController extends Controller
{
    /**
     * @param StaffRequest $request
     */
    public function index(StaffRequest $request)
    {
        dd($request);
    }
}
