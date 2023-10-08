<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $applicationSetting = \App\Models\ApplicationSetting::create([
            'item_name' => 'Enterprise Resource Planning',
            'item_short_name' => 'ERP',
            'item_version' => 'V 1.0',
            'company_name' => 'ALPHAONE',
            'company_email' => 'info@alphaonerp.com',
            'company_address' => '679 Western Ave. Suite 4 Lynn, MA 01905 United States',
            'developed_by' => 'ALPHAONE',
            'developed_by_href' => 'https://www.alphaonerp.com/',
            'developed_by_title' => 'Your hope our goal',
            'developed_by_prefix' => 'Developed by',
            'support_email' => 'info@alphaonerp.com',
            'language' => 'en',
            'is_demo' => '0',
            'time_zone' => 'America/New_York',
        ]);
    }
}
