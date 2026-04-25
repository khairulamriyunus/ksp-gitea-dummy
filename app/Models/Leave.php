<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Leave extends Model
{
    use SoftDeletes, LogsActivity;

    protected $table = 'leaves';

    protected $fillable = [
        'full_name',
        'email',
        'leave_type',
        'start_date',
        'end_date',
        'reason',
        'attachment',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }
}
