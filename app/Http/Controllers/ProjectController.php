<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectRepositoryInterface $repository
    )
    {}

    public function index(Request $request)
    {
        $projects = Project::query()->orderByDesc('id')->paginate(20);

        return view('project.index', compact('projects'));
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
