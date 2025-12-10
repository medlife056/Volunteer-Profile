<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteertask extends Model
{


    protected $table = 'volunteertasks';

    protected $fillable = [
        'VoulnteerID',
        'idJobTitel',
        'idActiveStatus',
        'supervisor_id',
        'Reason',
        'startDate',
        'EndDate'
    ];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'VoulnteerID');
    }

    public function jobTitle()
    {
        return $this->belongsTo(Jobtitle::class, 'idJobTitel');
    }

    public function activeStatus()
    {
        return $this->belongsTo(Activestatus::class, 'idActiveStatus');
    }

    public function cell()
    {
        return $this->belongsTo(Cell::class, 'cell_ID');
    }
}
