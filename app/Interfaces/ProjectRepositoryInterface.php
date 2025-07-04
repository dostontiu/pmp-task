<?php

namespace App\Interfaces;

use App\Models\Project;

interface ProjectRepositoryInterface
{
    public function all(): \Illuminate\Database\Eloquent\Collection;

    public function create(array $data): ?Project;

    public function update(array $data, int $id): int;

    public function delete(int $id): bool;

    public function find(int $id): ?Project;
}
