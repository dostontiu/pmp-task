<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return Project::all();
    }

    public function create(array $data): ?Project
    {
        return Project::create($data);
    }

    public function update(array $data, int $id): int
    {
        $model = Project::findOrFail($id);

        return $model->update($data);
    }

    public function delete(int $id): bool
    {
        $model = Project::findOrFail($id);

        return $model->delete();
    }

    public function find(int $id): ?Project
    {
        return Project::find($id);
    }
}
