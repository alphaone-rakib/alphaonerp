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

    Route::resources([
        'company' => App\Http\Controllers\CompanyController::class,
    ]);
});
