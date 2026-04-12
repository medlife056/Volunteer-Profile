<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $table = 'volunteers';

    protected $fillable = [
        'full_name',
        'phone',
        'national_id',
        'dob',
        'governorate',
        'address',
        'qualification',
        'university',
        'academic_year',
        'date_of_joining',
        'working_hours',
        'specialization',
        'hospital',
        'academic_status',
        'rating',
        'notes',
        'photo_path',
        'agreed_to_policy',
        'password'
    ];

    public function tasks()
    {
        return $this->hasMany(VolunteerTask::class, 'VoulnteerID', 'id');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'VoulnteerID','id');
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'volunteer_id');
    }
}
