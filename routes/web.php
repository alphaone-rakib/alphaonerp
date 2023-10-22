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

    Route::get('/company/selectedStateData', [App\Http\Controllers\CompanyController::class, 'selectedStateData'])->name('company.selectedStateData');
    Route::get('/company/selectedCityData', [App\Http\Controllers\CompanyController::class, 'selectedCityData'])->name('company.selectedCityData');

    Route::put('/company/{id}/salesUpdate', [
        'uses' => 'App\Http\Controllers\CompanyController@salesUpdate',
        'as' => 'company.salesUpdate'
    ]);

    Route::put('/company/{id}/purchaseUpdate', [
        'uses' => 'App\Http\Controllers\CompanyController@purchaseUpdate',
        'as' => 'company.purchaseUpdate'
    ]);

    Route::put('/company/{id}/inventoryUpdate', [
        'uses' => 'App\Http\Controllers\CompanyController@inventoryUpdate',
        'as' => 'company.inventoryUpdate'
    ]);

    Route::put('/company/{id}/logisticUpdate', [
        'uses' => 'App\Http\Controllers\CompanyController@logisticUpdate',
        'as' => 'company.logisticUpdate'
    ]);

    Route::put('/company/{id}/productionUpdate', [
        'uses' => 'App\Http\Controllers\CompanyController@productionUpdate',
        'as' => 'company.productionUpdate'
    ]);

    Route::put('/company/{id}/serviceUpdate', [
        'uses' => 'App\Http\Controllers\CompanyController@serviceUpdate',
        'as' => 'company.serviceUpdate'
    ]);

    Route::put('/company/{id}/projectUpdate', [
        'uses' => 'App\Http\Controllers\CompanyController@projectUpdate',
        'as' => 'company.projectUpdate'
    ]);

    Route::put('/company/{id}/humanResourceUpdate', [
        'uses' => 'App\Http\Controllers\CompanyController@humanResourceUpdate',
        'as' => 'company.humanResourceUpdate'
    ]);

    Route::put('/company/{id}/financeUpdate', [
        'uses' => 'App\Http\Controllers\CompanyController@financeUpdate',
        'as' => 'company.financeUpdate'
    ]);

    Route::resources([
        'company' => App\Http\Controllers\CompanyController::class,
    ]);
});
