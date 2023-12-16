<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'f_name',
        'l_name',
        'person_contact',
        'buyer_email'
    ];

    public function getNameAttribute()
    {
        return "{$this->f_name} {$this->l_name}";
    }

    public function getBuyerNameAttribute()
    {
        $fName = $this->f_name;
        $fNameLetter = $fName[0];
        return $fNameLetter . $this->l_name;
    }
}
