<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    use HasFactory;

    protected $table = 'initiative';

    protected $fillable = [
        'name',
        'goverment', 
        'startDate',
        'EndDate',
        'supervisor_id',
        'Advantages',
        'DisAdvantages',
        'summary',
        'DriveLink',
        'partners'
    ];
}