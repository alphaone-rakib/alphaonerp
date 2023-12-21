<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'group_id',
        'group_name',
        'description',
        'sales_site',
        'warranty',
        'planner',
        'tax_category'
    ];

    public function part_master()
    {
        return $this->hasMany(PartMaster::class, 'group_id');
    }
}
