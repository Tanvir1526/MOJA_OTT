<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

//_____________Common routes_____________
Route::get('/', [HomeController::class, 'login'])->name('login');
Route::get('/Register', [HomeController::class, 'register'])->name('register');

//_____________Admin routes_____________
Route::get('/Admin', [HomeController::class, 'adminDashboard'])->name('admin.Dashboard');