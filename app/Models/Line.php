<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'part_id',
        'description',
        'customer_id',
        'order_quantity',
        'order_quantity_type',
        'excepted_quantity',
        'excepted_quantity_type',
        'best_case_percentage',
        'worst_case_percentage',
        'confidence_percentage',
        'price_per',
        'unit_price',
        'override_price_list',
        'price_list',
        'discount_percentage',
        'discount_value',
        'override_discount_price_list',
        'discount_price_list',
        'price_group',
        'pricing_quantity',
        'pricing_quantity_type',
        'extended_price',
        'potential',
        'misc_charges',
        'tax',
        'total',
        'best_case_value',
        'worst_case_value',
        'excepted_value',
    ];

    public function partMaster()
    {
        return $this->belongsTo(PartMaster::class, 'part_id');
    }

    public function priceGroup()
    {
        return $this->belongsTo(ProductGroup::class, 'price_group');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
