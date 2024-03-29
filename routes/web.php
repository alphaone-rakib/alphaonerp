<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::get('/lang', [
    'uses' => 'App\Http\Controllers\HomeController@lang',
    'as' => 'lang.index'
]);

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/', function () {
    return redirect('dashboard');
});



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

    Route::get('/profile/setting', [
        'uses' => 'App\Http\Controllers\ProfileController@setting',
        'as' => 'profile.setting'
    ]);

    Route::post('/profile/updateSetting', [
        'uses' => 'App\Http\Controllers\ProfileController@updateSetting',
        'as' => 'profile.updateSetting'
    ]);
    Route::get('/profile/password', [
        'uses' => 'App\Http\Controllers\ProfileController@password',
        'as' => 'profile.password'
    ]);

    Route::post('/profile/updatePassword', [
        'uses' => 'App\Http\Controllers\ProfileController@updatePassword',
        'as' => 'profile.updatePassword'
    ]);
    Route::get('/profile/view', [
        'uses' => 'App\Http\Controllers\ProfileController@view',
        'as' => 'profile.view'
    ]);

    Route::get('/application-settings', [
        'uses' => 'App\Http\Controllers\ApplicationSettingController@index',
        'as' => 'application-settings.index'
    ]);

    Route::post('/application-settings/update', [
        'uses' => 'App\Http\Controllers\ApplicationSettingController@update',
        'as' => 'application-settings.update'
    ]);

    Route::get('/dashboard', [
        'uses' => 'App\Http\Controllers\DashboardController@index',
        'as' => 'dashboard.index'
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

    Route::put('/user/{id}/assignCompany', [
        'uses' => 'App\Http\Controllers\UserController@assignCompany',
        'as' => 'user.assignCompany'
    ]);

    Route::put('/user/{id}/accountAction', [
        'uses' => 'App\Http\Controllers\UserController@accountAction',
        'as' => 'user.accountAction'
    ]);

    Route::put('/customer/{id}/shippingUpdate', [
        'uses' => 'App\Http\Controllers\CustomerController@shippingUpdate',
        'as' => 'customer.shippingUpdate'
    ]);

    Route::put('/customer/{id}/billUpdate', [
        'uses' => 'App\Http\Controllers\CustomerController@billUpdate',
        'as' => 'customer.billUpdate'
    ]);

    Route::put('/customer/{id}/accountUpdate', [
        'uses' => 'App\Http\Controllers\CustomerController@accountUpdate',
        'as' => 'customer.accountUpdate'
    ]);

    Route::put('/part-master/{id}/revisionTabUpdate', [
        'uses' => 'App\Http\Controllers\PartMasterController@revisionTabUpdate',
        'as' => 'part-master.revisionTabUpdate'
    ]);

    Route::put('/part-master/{id}/plantTabUpdate', [
        'uses' => 'App\Http\Controllers\PartMasterController@plantTabUpdate',
        'as' => 'part-master.plantTabUpdate'
    ]);

    Route::put('/part-master/{id}/warehouseTabUpdate', [
        'uses' => 'App\Http\Controllers\PartMasterController@warehouseTabUpdate',
        'as' => 'part-master.warehouseTabUpdate'
    ]);


    Route::get('/revision/getData', [App\Http\Controllers\RevisionController::class, 'getData'])->name('revision.getData');
    Route::get('/warehouse/getData', [App\Http\Controllers\WarehouseController::class, 'getData'])->name('warehouse.getData');

    Route::get('/quote/selectedSoldCustomerId', [App\Http\Controllers\QuoteController::class, 'selectedSoldCustomerId'])->name('quote.selectedSoldCustomerId');

    Route::get('/line/selectedPartMasterId', [App\Http\Controllers\LineController::class, 'selectedPartMasterId'])->name('line.selectedPartMasterId');

    Route::resources([
        'bin' => App\Http\Controllers\BinController::class,
        'menu' => App\Http\Controllers\MenuController::class,
        'user' => App\Http\Controllers\UserController::class,
        'buyer' => App\Http\Controllers\BuyerController::class,
        'group' => App\Http\Controllers\GroupController::class,
        'plant' => App\Http\Controllers\PlantController::class,
        'quote' => App\Http\Controllers\QuoteController::class,
        'company' => App\Http\Controllers\CompanyController::class,
        'revision' => App\Http\Controllers\RevisionController::class,
        'customer' => App\Http\Controllers\CustomerController::class,
        'supplier' => App\Http\Controllers\SupplierController::class,
        'warehouse' => App\Http\Controllers\WarehouseController::class,
        'part-class' => App\Http\Controllers\PartClassController::class,
        'fiscal-year' => App\Http\Controllers\FiscalYearController::class,
        'part-master' => App\Http\Controllers\PartMasterController::class,
        'line' => App\Http\Controllers\LineController::class,
        'product-group' => App\Http\Controllers\ProductGroupController::class,
        'business-role' => App\Http\Controllers\BusinessRoleController::class,
        'customer-group' => App\Http\Controllers\CustomerGroupController::class,
        'one-time-ship-to' => App\Http\Controllers\OneTimeShipToController::class,
        'fiscal-calendar' => App\Http\Controllers\FiscalCalendarController::class,
        'production-calendar' => App\Http\Controllers\ProductionCalendarController::class,
        'company-configuration' => App\Http\Controllers\CompanyConfigurationController::class,
    ]);
});
