<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Common;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * @return array
     */
    public function index(): array
    {
        return Common::getAll(Job::class);
    }

    /**
     * @param Job $job
     * @return array
     */
    public function show(Job $job): array
    {
        return Common::getOne($job);
    }

    /**
     * @param JobRequest $request
     * @return array
     */
    public function store(JobRequest $request): array
    {
        return Common::do(Job::confirmNewPost($request), null, 'save');
    }

    /**
     * @param Job $job
     * @param JobRequest $request
     * @return array
     */
    public function update(Job $job, JobRequest $request): array
    {
        return Common::do($job, $request, 'update');
    }

    /**
     * @param Job $job
     * @return array
     */
    public function destroy(Job $job): array
    {
        return Common::do($job, null, 'remove');
    }
}
