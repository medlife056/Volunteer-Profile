<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ComplaintService;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    protected $complaintService;

    public function __construct(ComplaintService $complaintService)
    {
        $this->complaintService = $complaintService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $volunteerId = Auth::id();

        $complaint = $this->complaintService->createComplaint(
            $volunteerId,
            $request->only('content')
        );

        return response()->json([
            'message' => 'تم إرسال الشكوى بنجاح',
            'complaint' => $complaint
        ]);
    }
}
