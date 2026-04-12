<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerTask extends Model
{
    use HasFactory;
    protected $table = 'volunteerTasks';

    protected $fillable = [
        'VoulnteerID',
        'cell_ID',
        'idJobTitel',
        'idActiveStatus',
        'Reason',
        'startDate',
        'EndDate'
    ];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'VoulnteerID', 'id');
    }
}
