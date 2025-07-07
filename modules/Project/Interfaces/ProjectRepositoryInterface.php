<?php

namespace Modules\Project\Interfaces;

use Modules\Project\Models\Project;

interface ProjectRepositoryInterface
{
    public function paginate();

    public function create(array $data): ?Project;

    public function update(array $data, int $id): int;

    public function delete(int $id): bool;

    public function find(int $id): ?Project;
}
