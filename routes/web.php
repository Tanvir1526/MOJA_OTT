<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\SslCommerzPaymentController;
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

Route::group(['middleware' => ['admin_panel']],function(){
    Route::get('/Admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/Admin/AllUsers', [AdminController::class, 'viewAllUsers'])->name('admin.users.all');
    Route::get('Admin/AllPremiumUsers', [AdminController::class, 'viewAllPremiumUsers'])->name('admin.users.premium');
    Route::get('Admin/AllProductionHouse', [AdminController::class, 'viewAllProductionHouse'])->name('admin.users.production');
    Route::get('Admin/Alladmin', [AdminController::class, 'viewAlladmin'])->name('admin.users.admin');
    Route::get('Admin/Details/{id}', [AdminController::class, 'viewUserDetails'])->name('admin.users.details');

});



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
Route::post('/Premium.ProfileUpdate', [PremiumController::class, 'updateSubmit'])->name('users.update.submit')->middleware('logged.user');
Route::post('/Premium.ProfileUpdatePassword', [PremiumController::class, 'updatePasswordSubmit'])->name('users.update.password')->middleware('logged.user');
Route::get('/Premium/Inside/{id}', [PremiumController::class, 'inside'])->name('premium.inside')->middleware('logged.user');
Route::post('/Premium/RatingSubmit', [PremiumController::class, 'ratingSubmit'])->name('premium.rating.submit')->middleware('logged.user');
Route::post('/Premium/ReportSubmit', [PremiumController::class, 'reportSubmit'])->name('premium.report.submit')->middleware('logged.user');
Route::post('/Premium/MyListSubmit', [PremiumController::class, 'mylistSubmit'])->name('premium.mylist.submit')->middleware('logged.user');
Route::get('/Premium/MyList', [PremiumController::class, 'mylist'])->name('premium.mylist')->middleware('logged.user');
Route::post('/Premium/SearchSubmit',[PremiumController::class, 'searchSubmit'])->name('premium.search.submit')->middleware('logged.user');
Route::get('/Premium/Payment', [PremiumController::class, 'payment'])->name('premium.payment')->middleware('logged.user');

//_____________Production routes_____________
Route::get('/Production', [ProductionController::class, 'dashboard'])->name('production.dashboard')->middleware('logged.user');
Route::get('/Production/Upload', [ProductionController::class, 'upload'])->name('production.upload')->middleware('logged.user');
Route::post('/Production/Upload/Submit', [ProductionController::class, 'uploadSubmit'])->name('production.upload.submit')->middleware('logged.user');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->middleware('logged.user');
Route::post('/paymentsubmit', [SslCommerzPaymentController::class, 'payViaAjax'])->name('paymentsubmit');
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
