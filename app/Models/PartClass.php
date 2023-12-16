<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'class_name',
        'class_description',
        'class_buyer'
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'class_buyer');
    }
}
