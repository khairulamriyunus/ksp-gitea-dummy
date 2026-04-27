<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'leaves';

    protected $fillable = [
        'start_date',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];
}
