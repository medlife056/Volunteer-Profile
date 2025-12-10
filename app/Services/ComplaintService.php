<?php

namespace App\Services;

use App\Models\Complaint;

class ComplaintService
{
    public function createComplaint($volunteerId, array $data)
    {
        $data['volunteer_id'] = $volunteerId;
        $data['status'] = $data['status'] ?? 'pending';

        return Complaint::create($data);
    }
}
