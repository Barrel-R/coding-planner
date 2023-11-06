<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return inertia('Tasks/Index', [
            'collection' => Task::all(),
        ]);
    }

    public function show(int $id)
    {
        return inertia('Tasks/Show', [
            'record' => Task::find($id),
        ]);
    }

    public function create()
    {
        return inertia('Tasks/Create', [
            'projects' => Project::all(),
        ]);
    }

    public function store(TaskStoreRequest $request)
    {
        $task = Task::create($request->validated());

        return to_route('tasks.show', ['task' => $task->id]);
    }

    public function edit()
    {
    }

    public function update(TaskUpdateRequest $request, int $id)
    {
        Task::find($id)->update($request->validated());

        return to_route('tasks.show', ['task' => $id]);
    }

    public function destroy(int $id)
    {
        Task::destroy($id);

        return to_route('tasks.index');
    }
}
