<?php

namespace App\Interfaces;

use App\Models\Task;

interface TaskRepositoryInterface
{
    public function create(array $data): ?Task;

    public function update(array $data, int $id): int;

    public function delete(int $id): bool;

    public function find(int $id): ?Task;
}
