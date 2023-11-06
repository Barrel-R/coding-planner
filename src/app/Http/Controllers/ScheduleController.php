<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleStoreRequest;
use App\Http\Requests\ScheduleUpdateRequest;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        return inertia('Schedules/Index', [
            'collection' => Schedule::all(),
        ]);
    }

    public function show(int $id)
    {
        return inertia('Schedules/Show', [
            'record' => Schedule::find($id),
        ]);
    }

    public function create()
    {
        return inertia('Schedules/Create', [
            //
        ]);
    }

    public function store(ScheduleStoreRequest $request)
    {
        $schedule = Schedule::create($request->validated());

        return to_route('schedules.show', ['schedule' => $schedule->id]);
    }

    public function edit()
    {
    }

    public function update(ScheduleUpdateRequest $request, int $id)
    {
        Schedule::find($id)->update($request->validated());

        return to_route('schedules.show', ['schedule' => $id]);
    }

    public function destroy(int $id)
    {
        Schedule::destroy($id);

        return to_route('schedules.index');
    }
}
