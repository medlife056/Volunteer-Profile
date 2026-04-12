<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        return Complaint::latest()->get();
    }

    public function show($id)
    {
        return Complaint::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);

        $data = $request->validate([
            'status' => 'required|string'
        ]);

        $complaint->update($data);

        return $complaint;
    }
}
