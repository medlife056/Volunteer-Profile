<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'volunteer_id',
        'supervisor_id',
        'evaluation_date',
        'team_name',
        'initial_score',
        'monthly_score',
        'posts_score',
        'activity_score',
        'supervisor_opinion',
        'new_ideas_score',
        'creativity_score',
        'commitment_score',
        'meetings_attendance',
        'networking_participation',
        'negatives_notes',
        'ideas_presented',
        'final_score',
    ];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'volunteer_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(Volunteer::class, 'supervisor_id');
    }
}
