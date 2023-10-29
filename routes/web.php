<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/', function () {
//     try {
//         DB::connection()->getPdo();
//         if (!Schema::hasTable('application_settings'))
//             return redirect('/install');
//     } catch (Exception $e) {
//         return redirect('/install');
//     }
//     return redirect('dashboard');
// });

Auth::routes(['register' => false]);


Route::group(['middleware' => ['auth']], function () {

    Route::get('/application-settings', [
        'uses' => 'App\Http\Controllers\ApplicationSettingController@index',
        'as' => 'application-settings'
    ]);

    Route::post('/application-settings/update', [
        'uses' => 'App\Http\Controllers\ApplicationSettingController@update',
        'as' => 'application-settings.update'
    ]);

    Route::get('/dashboard', [
        'uses' => 'App\Http\Controllers\DashboardController@index',
        'as' => 'dashboard'
    ]);

    Route::get('/currency/code', [App\Http\Controllers\CompanyController::class, 'code'])->name('currency.code');
    Route::get('/currency/codeConfiguration', [App\Http\Controllers\CompanyConfigurationController::class, 'codeConfiguration'])->name('currency.codeConfiguration');

    Route::get('/company/selectedStateData', [App\Http\Controllers\CompanyController::class, 'selectedStateData'])->name('company.selectedStateData');
    Route::get('/company/selectedCityData', [App\Http\Controllers\CompanyController::class, 'selectedCityData'])->name('company.selectedCityData');
    Route::get('/user/forgetPassword', [App\Http\Controllers\UserController::class, 'forgetPassword'])->name('user.forgetPassword');

    Route::put('/company-configuration/{id}/salesUpdate', [
        'uses' => 'App\Http\Controllers\CompanyConfigurationController@salesUpdate',
        'as' => 'company-configuration.salesUpdate'
    ]);

    Route::put('/company-configuration/{id}/purchaseUpdate', [
        'uses' => 'App\Http\Controllers\CompanyConfigurationController@purchaseUpdate',
        'as' => 'company-configuration.purchaseUpdate'
    ]);

    Route::put('/company-configuration/{id}/inventoryUpdate', [
        'uses' => 'App\Http\Controllers\CompanyConfigurationController@inventoryUpdate',
        'as' => 'company-configuration.inventoryUpdate'
    ]);

    Route::put('/company-configuration/{id}/logisticUpdate', [
        'uses' => 'App\Http\Controllers\CompanyConfigurationController@logisticUpdate',
        'as' => 'company-configuration.logisticUpdate'
    ]);

    Route::put('/company-configuration/{id}/productionUpdate', [
        'uses' => 'App\Http\Controllers\CompanyConfigurationController@productionUpdate',
        'as' => 'company-configuration.productionUpdate'
    ]);

    Route::put('/company-configuration/{id}/serviceUpdate', [
        'uses' => 'App\Http\Controllers\CompanyConfigurationController@serviceUpdate',
        'as' => 'company-configuration.serviceUpdate'
    ]);

    Route::put('/company-configuration/{id}/projectUpdate', [
        'uses' => 'App\Http\Controllers\CompanyConfigurationController@projectUpdate',
        'as' => 'company-configuration.projectUpdate'
    ]);

    Route::put('/company-configuration/{id}/humanResourceUpdate', [
        'uses' => 'App\Http\Controllers\CompanyConfigurationController@humanResourceUpdate',
        'as' => 'company-configuration.humanResourceUpdate'
    ]);

    Route::put('/company-configuration/{id}/financeUpdate', [
        'uses' => 'App\Http\Controllers\CompanyConfigurationController@financeUpdate',
        'as' => 'company-configuration.financeUpdate'
    ]);

    Route::get('/business-role/childMenuchecked', [App\Http\Controllers\BusinessRoleController::class, 'childMenuchecked'])->name('business-role.childMenuchecked');

    Route::put('/user/{id}/assignBusinessProfile', [
        'uses' => 'App\Http\Controllers\UserController@assignBusinessProfile',
        'as' => 'user.assignBusinessProfile'
    ]);

    Route::resources([
        'company' => App\Http\Controllers\CompanyController::class,
        'company-configuration' => App\Http\Controllers\CompanyConfigurationController::class,
        'plant' => App\Http\Controllers\PlantController::class,
        'menu' => App\Http\Controllers\MenuController::class,
        'business-role' => App\Http\Controllers\BusinessRoleController::class,
        'user' => App\Http\Controllers\UserController::class,
    ]);
});
