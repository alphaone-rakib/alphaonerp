<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiscalCalendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiscal_calendar_id',
        'fiscal_calendar_name',
        'description',
        'fiscal_calendar_start',
        'fiscal_calendar_end'
    ];
}
