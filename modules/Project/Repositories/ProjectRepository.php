<?php

namespace Modules\Project\Repositories;

use Modules\Project\Interfaces\ProjectRepositoryInterface;
use Modules\Project\Models\Project;
use Modules\Project\DTO\ProjectDTO;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function paginate(int $perPage = 20)
    {
        return Project::query()->orderByDesc('id')->paginate($perPage);
    }

    public function create(ProjectDTO $projectDTO): ?Project
    {
        return Project::create([
            'name' => $projectDTO->name,
            'description' => $projectDTO->description,
            'user_id' => $projectDTO->user_id,
        ]);
    }

    public function update(ProjectDTO $projectDTO, int $id): int
    {
        $model = Project::findOrFail($id);

        return $model->update([
            'name' => $projectDTO->name,
            'description' => $projectDTO->description,
            'user_id' => $projectDTO->user_id,
        ]);
    }

    public function delete(int $id): bool
    {
        $model = Project::findOrFail($id);

        return $model->delete();
    }

    public function find(int $id): ?Project
    {
        return Project::findOrFail($id);
    }
}
