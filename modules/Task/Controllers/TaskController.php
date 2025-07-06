<?php

namespace Modules\Task\Controllers;

use Illuminate\Support\Facades\Gate;
use Modules\Task\Enums\TaskStatus;
use Modules\Task\Models\Task;
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

    public function status(TaskUpdateRequest $request, Task $task)
    {
        if ($request->status == TaskStatus::ASSIGNED->value) {
            if (!Gate::allows('acceptTask', $task)) {
                return redirect()->back()->with('error', 'You don\'t have permission acceptTask');
            }
        } elseif ($request->status == TaskStatus::ACCEPTED->value) {
            if (!Gate::allows('acceptTask', $task)) {
                return redirect()->back()->with('error', 'You don\'t have permission doneTask');
            }
        }
        $this->repository->status($request->validated(), $task->id);

        return redirect()->back()->with('success', 'Task status updated successfully');
    }
}
