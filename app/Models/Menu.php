<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'parent_id',
        'menu_href',
        'enabled'
    ];

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function businessRoles()
    {
        return $this->belongsToMany(BusinessRole::class, 'business_role_menu', 'menu_id', 'business_role_id');
    }
}
