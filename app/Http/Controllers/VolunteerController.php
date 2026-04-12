<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;
class VolunteerController extends Controller
{


public function index()
{
    return Volunteer::paginate(10);
}




public function store(Request $request)
{
    $data = $request->validate([
        'full_name' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'dob' => 'required|date'
    ]);

    return Volunteer::create($data);
}


public function update(Request $request, $id)
{
    $volunteer = Volunteer::findOrFail($id);

    $volunteer->update($request->all());

    return $volunteer;
}



    public function show($id)
    {
        return Volunteer::findOrFail($id);
    }



public function destroy($id)
{
    Volunteer::destroy($id);

    return response()->json(['message' => 'Deleted']);
}



}
