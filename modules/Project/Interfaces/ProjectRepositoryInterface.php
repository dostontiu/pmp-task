<?php

namespace Modules\Project\Interfaces;

use Modules\Project\DTO\ProjectDTO;
use Modules\Project\Models\Project;

interface ProjectRepositoryInterface
{
    public function paginate();

    public function create(ProjectDTO $projectDTO): ?Project;

    public function update(ProjectDTO $projectDTO, int $id): int;

    public function delete(int $id): bool;

    public function find(int $id): ?Project;
}
