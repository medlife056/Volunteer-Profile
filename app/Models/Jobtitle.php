<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobtitle extends Model
{
    protected $table = 'jobtitle';


    protected $fillable = [ 'name' ];

    public function tasks()
    {
        return $this->hasMany(VolunteerTask::class, 'idJobTitel');
    }
}
