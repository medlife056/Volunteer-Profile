<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EvaluationService;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    protected $evaluationService;

    public function __construct(EvaluationService $evaluationService)
    {
        $this->evaluationService = $evaluationService;
    }

    public function index()
    {
        $volunteerId = Auth::id();
        $evaluations = $this->evaluationService->getVolunteerEvaluations($volunteerId);

        return response()->json([
            'evaluations' => $evaluations
        ]);
    }

    public function show($id)
    {
        $volunteerId = Auth::id();
        $evaluation = $this->evaluationService->getEvaluationById($volunteerId, $id);

        if (!$evaluation) {
            return response()->json(['message' => 'التقييم غير موجود'], 404);
        }

        return response()->json([
            'evaluation' => $evaluation
        ]);
    }
}
