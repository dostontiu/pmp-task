<?php

namespace Modules\Project\Controllers;

use Illuminate\Http\Request;
use Modules\Project\Interfaces\ProjectRepositoryInterface;
use Modules\Project\Models\Project;
use Modules\Project\Requests\ProjectRequest;
use Modules\User\Models\User;

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

    public function show(int $id)
    {
        $project = $this->repository->find($id);
        $users = User::get();

        return view('project::view', compact('project', 'users'));
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
        try {
            $this->repository->delete($id);
            return redirect()->route('project.index')->with('success', 'Project deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('project.index')->with('error', 'You cannot delete this project');
        }
    }

}
