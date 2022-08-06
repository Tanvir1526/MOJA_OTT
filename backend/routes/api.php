<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\FreeController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [HomeController::class, 'login'])->name('login');
Route::post('/login', [HomeController::class, 'loginAPI']);
Route::get('/Register', [HomeController::class, 'register'])->name('register');
Route::post('/users.reg',[HomeController::class, 'regSubmit'])->name('users.reg.submit');
Route::get('/logout',[HomeController::class, 'logout'])->name('logout');
