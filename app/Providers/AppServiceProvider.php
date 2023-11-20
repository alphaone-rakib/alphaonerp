<?php

namespace App\Providers;

use App\Models\ApplicationSetting;
use App\Models\Company;
use App\Models\Menu;
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

    private static function formatTree($categories, $allCategories)
    {
        foreach ($categories as $category) {
            $category->children = $allCategories->where('parent_id', $category->id)->values();

            if ($category->children->isNotEmpty()) {
                self::formatTree($category->children, $allCategories);
            }
        }
    }

    public function tree()
    {
        $allCategories = Menu::orderBy('menu_order', 'ASC')->get();
        $rootCategories = $allCategories->whereNull('parent_id');
        self::formatTree($rootCategories, $allCategories);

        return $rootCategories;
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        view()->composer('*', function ($view) {
            $application = (Schema::hasTable('application_settings')) ? ApplicationSetting::first() : NULL;

            $mdiIcon = array(
                "dashboard" => "mdi-view-dashboard-outline",
                "plant" => "mdi-layers-outline",
                "user" => "mdi-account-outline",
                "company" => "mdi-cube-outline",
                "plant" => "mdi-layers-outline",
                "settings" => "mdi-cog",
                "Sales Module" => "mdi-cart-percent",
                "fiscal calendar" => "mdi-calendar-outline",
                "fiscal year" => "mdi-calendar-blank",
            );

            $getLang = array(
                'en' => 'English',
                'es' => 'Español',
                'de' => 'Deutch',
                'bn' => 'বাংলা',
            );

            $flag = array(
                "en" => "us",
                "es" => "es",
                "de" => "de",
                "bn" => "bd",
            );

            $user = [];
            $items = [];
            $items_reminder = [];
            $notifications = 0;
            $company_full_name = "No Company Imported";
            $activeCompany = [];
            $menuPermission = array();
            $menus = (object)[];
            if (Auth::check()) {

                foreach (auth()->user()->businessRoles as $role) {
                    foreach ($role->menus as $menu) {
                        $menuPermission[] = $menu->id;
                    }
                }
                $menuPermission = array_unique($menuPermission);

                $menus = $this->tree();

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

            $view->with('applicationSetting', $application)
                ->with('mdiIcon', $mdiIcon)
                ->with('getLang', $getLang)
                ->with('menus', $menus)
                ->with('menuPermission', $menuPermission)
                ->with('flag', $flag);
        });
    }
}
