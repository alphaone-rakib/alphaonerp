<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductionCalendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'production_calendar_id',
        'production_calendar_name',
        'description',
        'production_calendar_start',
        'production_calendar_end',
        'work_per_week'
    ];
}
