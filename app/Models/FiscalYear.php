<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiscalYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiscal_year_id',
        'fiscal_year_name',
        'description',
        'fiscal_year_start',
        'fiscal_year_end',
        'number_periods',
        'number_closing_periods'
    ];
}
