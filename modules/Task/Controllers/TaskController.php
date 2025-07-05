<?php

namespace Modules\Task\Controllers;

use Modules\Task\Interfaces\TaskRepositoryInterface;
use Modules\Task\Requests\TaskRequest;

class TaskController extends Controller
{
    public function __construct(
        protected TaskRepositoryInterface $repository
    )
    {}

    public function view(int $id)
    {
        $model = $this->repository->find($id);

        return view('task.view', compact('model'));
    }

    public function store(TaskRequest $request)
    {
        $model = $this->repository->create($request->validated());

        return redirect()->back()->with('success', 'Task added successfully');
    }

    public function update(TaskRequest $request, int $id)
    {
        $model = $this->repository->update($request->validated(), $id);

        return redirect()->back()->with('success', 'Task updated successfully');
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);

        return redirect()->back()->with('success', 'Task deleted successfully');
    }

}
