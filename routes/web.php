<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

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



Auth::routes();
Route::group(['middleware'=>['auth','has.permission']],function(){
    Route::get('/', function () {
        return view('admin.layouts.dashboard');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::view('a','admin.layouts.create');
    Route::resource('department',App\Http\Controllers\DepartmentController::class);
    Route::resource('role',App\Http\Controllers\RoleController::class);
    Route::resource('user',App\Http\Controllers\UserController::class);
    Route::resource('permission',App\Http\Controllers\PermissionController::class);
    Route::resource('leave',App\Http\Controllers\LeaveController::class);
    Route::resource('notice',App\Http\Controllers\NoticeController::class);
    Route::resource('mail',App\Http\Controllers\MailController::class);
    Route::post('accept-reject-leave/{id}',[App\Http\Controllers\LeaveController::class,'acceptReject'])->name('accept.reject');
//    Route::get('/mail',[App\Http\Controllers\MailController::class,'create']);

});
Auth::routes();

