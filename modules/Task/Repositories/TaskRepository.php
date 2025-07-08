<?php

namespace Modules\Task\Repositories;

use Modules\Task\DTO\TaskAssignDTO;
use Modules\Task\DTO\TaskStatusDTO;
use Modules\Task\Interfaces\TaskRepositoryInterface;
use Modules\Task\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function assign(TaskAssignDTO $dto): ?Task
    {
        return Task::create([
            'assigned_user_id' => $dto->assigned_user_id,
            'project_id' => $dto->project_id,
            'user_id' => $dto->user_id,
            'name' => $dto->name,
            'description' => $dto->description,
            'status' => $dto->status,
        ]);
    }

    public function status(TaskStatusDTO $dto, int $id): int
    {
        $model = Task::findOrFail($id);

        return $model->update([
            'status' => $dto->status
        ]);
    }
}
