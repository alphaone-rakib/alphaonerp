<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'supplier_id',
        'name',
        'description',
        'currency_id',
        'language_id',
        'tax_region',
        'tax_description',
        'group',
        'terms',
        'ship_via',
        'payment_method',
        'fob'
    ];
}
