<?php

namespace Modules\Task\Controllers;

use Modules\Task\Interfaces\TaskRepositoryInterface;
use Modules\Task\Requests\TaskRequest;
use Modules\Task\Requests\TaskUpdateRequest;
use Illuminate\Support\Facades\Mail;
use Modules\Task\Mail\TaskMail;

class TaskController extends Controller
{
    public function __construct(
        protected TaskRepositoryInterface $repository
    )
    {}

    public function assign(TaskRequest $request)
    {
        $task = $this->repository->create($request->validated());

        Mail::to($task->assignedUser?->email)->queue(new TaskMail($task));

        return redirect()->back()->with('success', 'Task added successfully');
    }

    public function status(TaskUpdateRequest $request, int $id)
    {
        $this->repository->status($request->validated(), $id);

        return redirect()->back()->with('success', 'Task status updated successfully');
    }
}
