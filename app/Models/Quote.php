<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'quote_entry',
        'sold_to_customer_name_address',
        'one_time_ship_address',
        'ship_to_customer_name_address',
        'bill_to_customer',
        'bill_to_po',
        'bill_to_open',
        'bill_to_due',
        'bill_to_days_open',
        'ship_via',
        'terms',
        'disc',
        'territory',
        'primary_sales',
        'best_case',
        'worst_case',
        'confidence',
        'gross_value',
        'discount_percentage',
        'discount_value',
        'rounding',
        'potential',
        'misc_charges',
        'tax',
        'total',
        'summary_best_case_percentage',
        'summary_best_case_value',
        'summary_worst_case_percentage',
        'summary_worst_case_value',
        'summary_exptected_percentage',
        'summary_exptected_value'
    ];
}
