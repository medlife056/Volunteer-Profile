<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    public function index()
    {
        return response()->json(JobTitle::all());
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required|string',
    ]);

    $jobTitle = JobTitle::create($validated);
    return response()->json($jobTitle, 201);
    }

    

    public function show(JobTitle $jobTitle)
    {
        return response()->json($jobTitle);
    }

    public function update(Request $request, JobTitle $jobTitle)
    {
    $validated = $request->validate([
        'name' => 'required|string', // عدلناها من title لـ name
    ]);

    $jobTitle->update($validated);
    return response()->json($jobTitle);
    }

    public function destroy(JobTitle $jobTitle)
    {
        $jobTitle->delete();
        return response()->json(['message' => 'JobTitle deleted successfully']);
    }
}
