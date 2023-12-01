<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'group_id',
        'group_name',
        'description',
        'percentage_rate'
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class, 'bill_customer_group_id');
    }
}
