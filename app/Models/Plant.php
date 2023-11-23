<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'plant_id',
        'name',
        'description',
        'enabled'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
