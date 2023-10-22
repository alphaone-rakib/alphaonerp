<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'enabled'
    ];

    public function users()
    {
        return $this->morphedByMany(User::class, 'user', 'user_companies', 'company_id', 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function plants()
    {
        return $this->hasMany(Plant::class);
    }

    public function settings()
    {
        return $this->hasMany(Setting::class);
    }

    public function getCompanyIdAttribute()
    {
        return $this->id;
    }

    public function setSettings()
    {
        $settings = $this->settings;

        foreach ($settings as $setting) {
            list($group, $key) = explode('.', $setting->getAttribute('key'));

            // Load only general settings
            if ($group != 'general') {
                continue;
            }

            $value = $setting->getAttribute('value');

            if (($key == 'company_logo') && empty($value)) {
                $value = 'public/img/company.png';
            }

            $this->setAttribute($key, $value);
        }

        // Set default default company logo if empty
        if ($this->getAttribute('company_logo') == '') {
            $this->setAttribute('company_logo', 'public/img/company.png');
        }
    }
}
