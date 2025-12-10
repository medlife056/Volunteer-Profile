<?php

namespace App\Services;

use App\Models\SupervisorRating;
use App\Models\Volunteertask;

class SupervisorRatingService
{

    public function getSupervisorsListForSelect()
    {
        $supervisors = Volunteertask::join('volunteers', 'volunteertasks.VoulnteerID', '=', 'volunteers.id')
            ->join('jobtitle', 'volunteertasks.idJobTitel', '=', 'jobtitle.id')
            ->join('activestatus', 'volunteertasks.idActiveStatus', '=', 'activestatus.id')
            ->where('activestatus.name', 'مستمر')
            ->where('jobtitle.name', 'like', '%مشرف%')
            ->select('volunteers.id', 'volunteers.full_name')
            ->distinct()
            ->orderBy('volunteers.full_name')
            ->get();

        return $supervisors->map(function ($item) {
            return [
                'id' => $item->id,
                'full_name' => $item->full_name
            ];
        });
    }




    public function rateSupervisor($supervisorId, array $data)
    {
        $volunteerId = auth()->id();

        return SupervisorRating::create([
            'volunteer_id' => $volunteerId,
            'supervisor_id' => $supervisorId,
            ...$data
        ]);
    }
}
