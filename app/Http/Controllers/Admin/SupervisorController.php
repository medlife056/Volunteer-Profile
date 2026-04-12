<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VolunteerTask;

class SupervisorController extends Controller
{
    public function performance()
    {
        return VolunteerTask::selectRaw('
                cell_ID,
                COUNT(*) as total_tasks,
                SUM(CASE WHEN idActiveStatus = 3 THEN 1 ELSE 0 END) as completed_tasks,
                SUM(CASE WHEN idActiveStatus = 4 THEN 1 ELSE 0 END) as late_tasks
            ')
            ->groupBy('cell_ID')
            ->get()
            ->map(function ($item) {

                $item->completion_rate = $item->total_tasks > 0
                    ? round(($item->completed_tasks / $item->total_tasks) * 100, 2)
                    : 0;

                return $item;
            });
    }
}
