<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupervisorRating extends Model
{
    protected $fillable = [
        'volunteer_id',
        'supervisor_id',
        'activity_score',
        'behavior_score',
        'motivation_score',
        'scientific_skill_score',
        'pros_cons',
        'fairness_score',
        'team_quality_score',
        'tasks_distribution_fairness',
        'general_supervisor_time',
        'management_behavior',
        'space_given',
        'listening_and_suggestions',
    ];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'volunteer_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(Volunteer::class, 'supervisor_id');
    }
    public function supervisorUser()
    {
        return $this->belongsTo(Volunteer::class, 'supervisor_id');
    }

}
