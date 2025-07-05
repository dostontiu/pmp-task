<?php

namespace Modules\Project\Controllers;

use Illuminate\Http\Request;
use Modules\Project\Interfaces\ProjectRepositoryInterface;
use Modules\Project\Models\Project;
use Modules\Project\Requests\ProjectRequest;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectRepositoryInterface $repository
    )
    {}

    public function index(Request $request)
    {
        $projects = Project::query()->orderByDesc('id')->paginate(20);

        return view('project::index', compact('projects'));
    }

    public function view(int $id)
    {
        $model = $this->repository->find($id);

        return view('project.view', compact('model'));
    }

    public function store(ProjectRequest $request)
    {
        $model = $this->repository->create($request->validated());

        return redirect()->route('project.index')->with('success', 'Project added successfully');
    }

    public function edit(Project $project)
    {
        return response()->json($project);
    }

    public function update(ProjectRequest $request, int $id)
    {
        $model = $this->repository->update($request->validated(), $id);

        return redirect()->route('project.index')->with('success', 'Project updated successfully');
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);

        return redirect()->route('project.index')->with('success', 'Project deleted successfully');
    }

}
