<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Http\Request;
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
Route::post('/users.login', [HomeController::class, 'loginSubmit'])->name('users.login.submit');
Route::get('/Register', [HomeController::class, 'register'])->name('register');
Route::post('/users.reg',[HomeController::class, 'regSubmit'])->name('users.reg.submit');
Route::get('/logout',[HomeController::class, 'logout'])->name('logout');

//_____________Admin routes_____________
Route::get('/Admin', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('logged.user');


//_____________Email Verification_____________
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');



Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//_____________Premium Subscriber routes_____________
Route::get('/Premium', [PremiumController::class, 'dashboard'])->name('premium.dashboard')->middleware('logged.user');
Route::get('/Premium/Profile', [PremiumController::class, 'profile'])->name('premium.profile')->middleware('logged.user');
