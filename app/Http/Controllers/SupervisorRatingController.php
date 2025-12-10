<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SupervisorRatingService;

class SupervisorRatingController extends Controller
{
    protected $service;

    public function __construct(SupervisorRatingService $service)
    {
        $this->service = $service;
    }

    public function getSupervisorsList()
    {
        $supervisors = $this->service->getSupervisorsListForSelect();

        return response()->json([
            'supervisors' => $supervisors
        ]);
    }


    public function rateSupervisor(Request $request, $supervisorId)
    {
        $request->validate([
            'activity_score' => 'required|integer|min:1|max:5',
            'behavior_score' => 'required|integer|min:1|max:5',
            'motivation_score' => 'required|integer|min:1|max:5',
            'scientific_skill_score' => 'required|integer|min:1|max:5',
            'pros_cons' => 'nullable|string',
            'fairness_score' => 'required|integer|min:1|max:5',
            'team_quality_score' => 'required|integer|min:1|max:5',
            'tasks_distribution_fairness' => 'required|integer|min:1|max:5',
            'general_supervisor_time' => 'required|integer|min:1|max:5',
            'management_behavior' => 'nullable|string',
            'space_given' => 'nullable|string',
            'listening_and_suggestions' => 'nullable|string',
        ]);

        $rating = $this->service->rateSupervisor($supervisorId, $request->all());

        return response()->json([
            'message' => 'تم تسجيل التقييم بنجاح',
            'rating' => $rating
        ]);
    }
}
