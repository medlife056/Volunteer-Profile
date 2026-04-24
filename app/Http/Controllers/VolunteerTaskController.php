<?php

namespace App\Http\Controllers;

use App\Models\VolunteerTask;
use Illuminate\Http\Request;

class VolunteerTaskController extends Controller
{
    public function index()
    {
        return response()->json(VolunteerTask::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'VoulnteerID' => 'required|integer',
            'cell_ID' => 'required|integer',
            'idJobTitel' => 'required|integer',
            'idActiveStatus' => 'required|integer',
            'Reason' => 'nullable|string',
            'startDate' => 'nullable|date',
            'EndDate' => 'nullable|date',
        ]);

        $task = VolunteerTask::create($validated);
        return response()->json($task, 201);
    }

    public function show(VolunteerTask $volunteerTask)
    {
        return response()->json($volunteerTask);
    }

    public function update(Request $request, VolunteerTask $volunteerTask)
    {
        $validated = $request->validate([
            'VoulnteerID' => 'required|integer',
            'cell_ID' => 'required|integer',
            'idJobTitel' => 'required|integer',
            'idActiveStatus' => 'required|integer',
            'Reason' => 'nullable|string',
            'startDate' => 'nullable|date',
            'EndDate' => 'nullable|date',
        ]);

        $volunteerTask->update($validated);
        return response()->json($volunteerTask);
    }

    public function destroy(VolunteerTask $volunteerTask)
    {
        $volunteerTask->delete();
        return response()->json(['message' => 'Volunteer Task deleted successfully']);
    }
}