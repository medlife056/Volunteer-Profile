<?php

namespace App\Services;

use App\Models\Evaluation;

class EvaluationService
{
    public function getVolunteerEvaluations($volunteerId)
    {
        return Evaluation::where('volunteer_id', $volunteerId)
            ->with(['supervisor' => function ($query) {
                $query->select(
                    'id',
                    'full_name',
                    'specialization',
                    'academic_status',
                    'qualification',
                    'university',
                    'academic_year'
                );
            }])
            ->orderBy('evaluation_date', 'desc')
            ->get();
    }

    public function getEvaluationById($volunteerId, $evaluationId)
    {
        return Evaluation::where('volunteer_id', $volunteerId)
            ->where('id', $evaluationId)
            ->with(['supervisor' => function ($query) {
                $query->select(
                    'id',
                    'full_name',
                    'specialization',
                    'academic_status',
                    'qualification',
                    'university',
                    'academic_year'
                );
            }])
            ->first();
    }
}
