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
        'description',
        'enabled'
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'business_role_menu', 'business_role_id', 'menu_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'business_role_user', 'business_role_id', 'user_id');
    }
}
