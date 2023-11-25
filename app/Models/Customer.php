<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'address_one',
        'address_two',
        'city',
        'state',
        'zip_code',
        'country',
        'phone',
        'fax',
        'email',
        'url',
        'logo',
        'ship_address_one',
        'ship_address_two',
        'ship_city',
        'ship_state',
        'ship_zip_code',
        'ship_country',
        'ship_phone',
        'ship_fax',
        'bill_currency_id',
        'bill_customer_group_id',
        'bill_payment_method_id',
        'bill_federal_id',
        'bill_terms_id',
        'bill_terms_type',
        'bill_ship_via',
        'bill_fob',
        'bill_tax_id',
        'contact_name',
        'contact_title',
        'contact_email',
        'contact_phone',
        'contact_cell_phone',
        'billing',
        'purchasing',
        'shipping'
    ];
}
