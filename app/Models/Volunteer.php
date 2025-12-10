<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Volunteer extends Authenticatable
{
    use HasApiTokens, Notifiable;

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
        'password',

    ];

//    protected $hidden = ['password'];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'volunteer_id');
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'volunteer_id');
    }

    public function supervisorRatings()
    {
        return $this->hasMany(SupervisorRating::class, 'volunteer_id');
    }

    public function setPasswordAttribute($password)
    {
        if ($password && strlen($password) < 60) {
            $this->attributes['password'] = Hash::make($password);
        } else {
            $this->attributes['password'] = $password;
        }
    }
}
