<?php

use App\Http\Controllers\AssignCustomerController;
use App\Http\Controllers\AssignGroupAdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GroupAdministratorController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ListCustomerController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Super Admin
Route::resource('group', GroupController::class);
Route::resource('assign-group-admin', AssignGroupAdminController::class);
Route::resource('assign-customer', AssignCustomerController::class);
Route::resource('list-customer', ListCustomerController::class);

// Customer
Route::resource('customer', CustomerController::class);

// Group Administrator
Route::resource('group-administrator', GroupAdministratorController::class);
