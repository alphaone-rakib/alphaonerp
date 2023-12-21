<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'warehouse_id',
        'description',
        'name',
        'address_one',
        'address_two',
        'city',
        'state',
        'zip_code',
        'country',
        'manager_name'
    ];

    public function part_master()
    {
        return $this->hasMany(PartMaster::class, 'warehouse_name');
    }
}
