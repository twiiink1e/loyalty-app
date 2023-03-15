<?php
  
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\AdminPasswordController;
use App\Http\Controllers\Backend\AnnouncementController;
use App\Http\Controllers\Backend\CalculationController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\PointController;
use App\Http\Controllers\Backend\RedeemController;
use App\Http\Controllers\Backend\RewardController;


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
    return view('newwelcome');
})->name('welcome');

Route::get('/error', function () {
    return view('errors.deny');
})->name('deny');

Route::get('/announcement', function () {
    return view('frontend.announcement');
})->name('announcement');
  
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    

});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/customers', function () {
        return view('backend.customers.index');
    });
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::resource('admin/customers', CustomerController::class);

    Route::resource('admin/rewards', RewardController::class);

    Route::resource('admin/companies', CompanyController::class);

    Route::resource('admin/announcements', AnnouncementController::class);

    Route::resource('admin/calculations', CalculationController::class);

    Route::resource('admin/payments', PaymentController::class);

    Route::resource('admin/points', PointController::class);

    Route::resource('admin/redeems', RedeemController::class);

    Route::get('admin/redeems/updatestatus/{id}', [RedeemController::class,'updateStatus'])->name('updateStatus');

    Route::get('admin/change-password', [AdminPasswordController::class, 'changePassword'])->name('admin-change-password');
    Route::post('admin/change-password', [AdminPasswordController::class, 'updatePassword'])->name('admin-update-password');

    
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
 