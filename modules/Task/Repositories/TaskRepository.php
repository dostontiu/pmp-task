<?php

namespace Modules\Task\Repositories;

use Modules\Task\Interfaces\TaskRepositoryInterface;
use Modules\Task\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function create(array $data): ?Task
    {
        return Task::create($data);
    }

    public function update(array $data, int $id): int
    {
        $model = Task::findOrFail($id);

        return $model->update($data);
    }

    public function delete(int $id): bool
    {
        $model = Task::findOrFail($id);

        return $model->delete();
    }

    public function find(int $id): ?Task
    {
        return Task::find($id);
    }
}
