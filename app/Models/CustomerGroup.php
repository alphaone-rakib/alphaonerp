<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
