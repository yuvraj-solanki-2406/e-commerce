<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index']);

Route::group(['middleware' => 'admin_auth'], function () {
    Route::post('/admin/auth', [AdminController::class, 'auth'])->name('admin/auth');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/category', [CategoryController::class, 'index']);
    Route::get('/admin/logout', function(){
        session()->forget('Admin_login',true);
        session()->forget('Admin_Id');
        session()->flash('logout','Logout successfully');
        return redirect('/admin');
    });

});
