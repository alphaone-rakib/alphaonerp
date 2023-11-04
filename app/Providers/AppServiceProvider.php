<?php

namespace App\Providers;

use App\Models\ApplicationSetting;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        view()->composer('*', function ($view) {
            $application = (Schema::hasTable('application_settings')) ? ApplicationSetting::first() : NULL;

            $getLang = array(
                'en' => 'English',
                'bn' => 'বাংলা',
                'el' => 'Ελληνικά',
                'pt' => 'Português',
                'es' => 'Español',
                'de' => 'Deutch',
                'fr' => 'Français',
                'nl' => 'Nederlands',
                'it' => 'Italiano',
                'vi' => 'Tiếng Việt',
                'ru' => 'русский',
                'tr' => 'Türkçe',
                'ar' => 'عربي'
            );

            $user = [];
            $items = [];
            $items_reminder = [];
            $notifications = 0;
            $company_full_name = "No Company Imported";
            $activeCompany = [];
            if (Auth::check()) {
                $companies = auth()->user()->companies()->with(['settings'])->get();
                $firstCompanies = $companies->first();

                if (!empty(auth()->user()->company_id))
                    session(['company_id' => auth()->user()->company_id]);
                elseif (!empty($firstCompanies))
                    session(['company_id' => $firstCompanies->id]);

                foreach ($companies as $company) {
                    $company->setSettings();
                    if ($company->id == session('company_id')) {
                        $activeCompany = $company;
                        $company_full_name = $activeCompany->name;
                    }
                    $companySwitchingInfo[$company->id] = $company->name;
                }

                $firstCompanies = Auth::user()->companies()->first();
                if (isset($firstCompanies) && !empty($firstCompanies)) {
                    Session::put('company_id', $firstCompanies->id);
                }

                if (isset(Auth::user()->company_id) && !empty(Auth::user()->company_id)) {
                    Session::put('company_id', Auth::user()->company_id);
                }

                $company = Company::where('id', Session::get('company_id'))->get('name')->first();

                if (isset($company->name)) {
                    $company_full_name = $company->name;
                } else {
                    $company_full_name = "No Company Imported";
                }

                $companies = Auth::user()->companies()->get();
                foreach ($companies as $company) {
                    $company->setSettings();
                }

                $companySwitchingInfo = array();
                foreach ($companies as $key => $value) {
                    if ($value->id == Session::get('company_id')) {
                        $str = "";
                    } else {
                        $str = "";
                    }
                    $companySwitchingInfo[$value->id] = $str . $value->name;
                }
                $user = Auth::user();
            }

            if (empty($companySwitchingInfo)) {
                $companySwitchingInfo["0"] = "No Company Imported";
            }

            if (empty($company_full_name)) {
                $company_full_name["0"] = "No Company Imported";
            }

            $view->with('applicationSetting', $application);
        });
    }
}
