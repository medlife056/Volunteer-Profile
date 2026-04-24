<?php

namespace App\Http\Controllers;

use App\Models\Initiative;
use Illuminate\Http\Request;

class InitiativeController extends Controller
{
    public function index()
    {
        return response()->json(Initiative::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'goverment' => 'required|string|max:255',
            'startDate' => 'nullable|date',
            'EndDate' => 'nullable|date',
            'supervisor_id' => 'required|integer',
            'Advantages' => 'nullable|string',
            'DisAdvantages' => 'nullable|string',
            'summary' => 'nullable|string',
            'DriveLink' => 'nullable|string',
            'partners' => 'nullable|string',
        ]);

        $initiative = Initiative::create($validated);
        return response()->json($initiative, 201);
    }

    public function show(Initiative $initiative)
    {
        return response()->json($initiative);
    }

    public function update(Request $request, Initiative $initiative)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'goverment' => 'required|string|max:255',
            'startDate' => 'nullable|date',
            'EndDate' => 'nullable|date',
            'supervisor_id' => 'required|integer',
            'Advantages' => 'nullable|string',
            'DisAdvantages' => 'nullable|string',
            'summary' => 'nullable|string',
            'DriveLink' => 'nullable|string',
            'partners' => 'nullable|string',
        ]);

        $initiative->update($validated);
        return response()->json($initiative);
    }

    public function destroy(Initiative $initiative)
    {
        $initiative->delete();
        return response()->json(['message' => 'Initiative deleted successfully']);
    }
}