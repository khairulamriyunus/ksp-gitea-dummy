<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    protected $table = 'leave_applications';

    protected $fillable = [
        'applicant_name',
        'leave_type',
        'start_date',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];
}
