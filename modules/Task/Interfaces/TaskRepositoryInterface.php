<?php

namespace Modules\Task\Interfaces;

use Modules\Task\Models\Task;

interface TaskRepositoryInterface
{
    public function create(array $data): ?Task;

    public function status(array $data, int $id): int;
}
