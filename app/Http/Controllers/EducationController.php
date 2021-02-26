<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Http\Requests\JobRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\Common;
use App\Models\Education;
use App\Models\Job;

class EducationController extends Controller
{
    /**
     * @return array
     */
    public function index(): array
    {
        return Common::getAll(Education::class);
    }

    /**
     * @param Education $education
     * @return array
     */
    public function show(Education $education): array
    {
        return Common::getOne($education);
    }

    /**
     * @param EducationRequest $request
     * @return array
     */
    public function store(EducationRequest $request): array
    {
        return Common::do(Education::confirmNewPost($request), null, 'save');
    }

    /**
     * @param Education $education
     * @param UpdateEducationRequest $request
     * @return array
     */
    public function update(Education $education, UpdateEducationRequest $request): array
    {
        return Common::do($education, $request, 'update');
    }
}
