<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return inertia('Projects/Index', [
            'collection' => Project::all(),
        ]);
    }

    public function show(int $id)
    {
        return inertia('Projects/Show', [
            'record' => Project::find($id),
        ]);
    }

    public function create()
    {
        return inertia('Projects/Create', [
            //
        ]);
    }

    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->validated());

        return to_route('projects.show', ['project' => $project->id]);
    }

    public function edit()
    {
    }

    public function update(ProjectUpdateRequest $request, int $id)
    {
        Project::find($id)->update($request->validated());

        return to_route('projects.show', ['project' => $id]);
    }

    public function destroy(int $id)
    {
        Project::destroy($id);

        return to_route('projects.index');
    }
}
