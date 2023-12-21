<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'name',
        'description',
        'zone',
        'squence',
        'inactive',
        'non_nettable',
        'portable'
    ];

    public function part_master()
    {
        return $this->hasMany(PartMaster::class, 'warehouse_primary_bin');
    }
}
