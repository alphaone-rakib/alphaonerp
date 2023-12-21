<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'revision_id',
        'revision_name',
        'revision_description',
        'effective_date',
        'approved'
    ];

    public function part_master()
    {
        return $this->hasMany(PartMaster::class, 'revision_id');
    }
}
