<?php

namespace Modules\Task\Controllers;

use Modules\Task\Interfaces\TaskRepositoryInterface;
use Modules\Task\Requests\TaskRequest;
use Modules\Task\Requests\TaskUpdateRequest;

class TaskController extends Controller
{
    public function __construct(
        protected TaskRepositoryInterface $repository
    )
    {}

    public function assign(TaskRequest $request)
    {
        $this->repository->create($request->validated());

        return redirect()->back()->with('success', 'Task added successfully');
    }

    public function status(TaskUpdateRequest $request, int $id)
    {
        $this->repository->status($request->validated(), $id);

        return redirect()->back()->with('success', 'Task status updated successfully');
    }
}
