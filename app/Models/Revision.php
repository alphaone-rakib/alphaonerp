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
        'revision_description'
    ];
}
