<?php

namespace Modules\Task\Interfaces;

use Modules\Task\DTO\TaskAssignDTO;
use Modules\Task\DTO\TaskStatusDTO;
use Modules\Task\Models\Task;

interface TaskRepositoryInterface
{
    public function assign(TaskAssignDTO $dto): ?Task;

    public function status(TaskStatusDTO $dto, int $id): int;
}
