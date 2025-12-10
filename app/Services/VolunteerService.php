<?php

namespace App\Services;


use App\Models\Volunteer;
use Illuminate\Support\Facades\Hash;

class VolunteerService
{
    public function getProfile($userId)
    {
        return Volunteer::with([
            'evaluations.supervisor:id,full_name',
            'complaints',
            'supervisorRatings' => function($query) {
                $query->with(['supervisorUser:id,full_name']);
            }
        ])->findOrFail($userId);
    }


    public function updateProfile($userId, array $data)
    {
        $volunteer = Volunteer::findOrFail($userId);

        // معالجة كلمة المرور
        if (isset($data['password']) && $data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);

        }

        $volunteer->update($data);

        return $volunteer;
    }

}
