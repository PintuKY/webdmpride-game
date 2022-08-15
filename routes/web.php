<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Middleware\SuperAdmin;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\BetController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\ContentController;

use App\Http\Controllers\forgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// admin login
Route::get('admin/login',[LoginController::class ,'showLoginForm'])->name('admin.login');
Route::post('admin/login',[LoginController::class ,'login']);

// Forgot password
Route::get('forget-password', [forgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [forgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [forgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [forgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::group(['prefix'=>'admin'], function(){

    Route::middleware([SuperAdmin::class])->group(function () {
        Route::get('home',[HomeController::class ,'index'])->name('adminHome');
        Route::post('logout',[LoginController::class ,'logout'])->name('adminLogout');
        Route::post('update_setting', [SettingsController::class,'update_settings'])->name('admin.settings.update');

        // customers
        Route::get('customers',[CustomerController::class ,'index']);

         // widthdrawl wallet
         Route::get('withdrawals/show',[HomeController::class ,'show']);
         Route::get('withdrawals/request/completed',[HomeController::class ,'ComWithReq'])->name('admin.wallet.with.com');
         Route::post('withdrawals/request/permission',[HomeController::class ,'Permission'])->name('admin.withdrawals.permission');

         // add wallet
         Route::get('wallet/request',[WalletController::class ,'show'])->name('admin.wallet');
         Route::get('wallet/request/completed',[WalletController::class ,'ComReq'])->name('admin.wallet.com');
         Route::post('wallet/request/permission',[WalletController::class ,'Permission'])->name('admin.wallet.permission');


        //  Bank Request
        Route::get('bank/request',[BankController::class ,'show'])->name('admin.bank');
        Route::get('bank/request/completed',[BankController::class ,'ComReq'])->name('admin.bank.com');
        Route::post('bank/request/permission',[BankController::class ,'Permission'])->name('admin.bank.permission');

        // bet
        Route::get('bet',[BetController::class ,'index'])->name('bet.show');
        Route::get('create/bet',[BetController::class ,'CreateForm'])->name('bet.form');
        Route::post('create/bet',[BetController::class ,'Create'])->name('bet.create');
        Route::get('edit/bet',[BetController::class ,'Edit'])->name('bet.edit');
        Route::post('update/bet',[BetController::class ,'Update'])->name('bet.Update');
        Route::get('bet/record',[BetController::class ,'BetRecord'])->name('bet.record');

         // Games
         Route::get('game',[GameController::class ,'index'])->name('game.show');
         Route::get('create/game',[GameController::class ,'CreateForm'])->name('game.form');
         Route::post('create/game',[GameController::class ,'Create'])->name('game.create');
         Route::get('edit/game',[GameController::class ,'EditGame'])->name('game.edit');
         Route::post('update/game',[GameController::class ,'Update'])->name('game.update');


        // settings
        Route::get('settings',[SettingsController::class ,'index']);
        Route::get('update/profile',[SettingsController::class ,'UpdateProfile'])->name('admin.update.profile');
        Route::post('update/profile',[SettingsController::class ,'UpdateProfileDetails'])->name('admin.update.details');

        Route::get('update/bank/details',[SettingsController::class ,'UpdateBank'])->name('admin.bank.details');
        Route::post('update/bank/details',[SettingsController::class ,'UpdateBankDetails'])->name('admin.bank.update');

        // change password
        Route::get('change-password',[HomeController::class ,'change_password']);
        Route::post('updatepassword', [HomeController::class ,'update_password'])->name('updatepass');

        // App Content
        Route::get('content',[ContentController::class ,'Content'])->name('app.content');
        Route::get('content-create',[ContentController::class ,'ContentCreate'])->name('admin.content');
        Route::post('content-create',[ContentController::class ,'ContentStore'])->name('admin.content.store');
        Route::get('edit/content',[ContentController::class ,'Editcontent'])->name('content.edit');
        Route::post('update/content',[ContentController::class ,'Update'])->name('content.update');

        Route::get('test',[SettingsController::class ,'TestGame']);

    });

});
