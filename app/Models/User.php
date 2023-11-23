<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'user_id',
        'f_name',
        'm_name',
        'l_name',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'address_one',
        'address_two',
        'city',
        'state',
        'zip_code',
        'country',
        'office_phone',
        'cell_phone',
        'language',
        'photo',
        'company_id',
        'locale',
        'date_of_birth',
        'gender',
        'blood_group',
        'status',
        'enabled',
        'locked',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getNameAttribute()
    {
        return ucfirst($this->f_name) . ' ' . ucfirst($this->m_name) . ' ' . ucfirst($this->l_name);
    }

    public function companies()
    {
        return $this->morphToMany(Company::class, 'user', 'user_companies', 'user_id', 'company_id');
    }

    public function businessRoles()
    {
        return $this->belongsToMany(BusinessRole::class, 'business_role_user', 'user_id', 'business_role_id');
    }

    public function plants()
    {
        return $this->belongsToMany(Plant::class, 'plant_user', 'user_id', 'plant_id');
    }
}
