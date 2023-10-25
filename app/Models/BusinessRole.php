<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'role_id',
        'name',
        'menus_ids',
        'description',
        'enabled'
    ];
}
