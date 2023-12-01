<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'group_id',
        'group_name',
        'description'
    ];
}
