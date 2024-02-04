<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OneTimeShipTo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'contact',
        'name',
        'address_one',
        'address_two',
        'save_as',
        'customer_id',
        'ship_to',
        'city',
        'state',
        'postal_code',
        'country',
        'phone',
        'fax',
        'tax_id',
        'tax_liability'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
