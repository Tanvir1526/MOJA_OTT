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
Route::post('/register', [HomeController::class, 'registerAPI']);

Route::any('/logout',[HomeController::class, 'logoutAPI']);

//_____________Admin routes_____________

Route::group(['middleware' => ['admin_panel','type']],function(){
    Route::get('/Admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/Admin/AllUsers', [AdminController::class, 'viewAllUsers'])->name('admin.users.all');
    Route::get('Admin/AllPremiumUsers', [AdminController::class, 'viewAllPremiumUsers'])->name('admin.users.premium');
    Route::get('Admin/AllProductionHouse', [AdminController::class, 'viewAllProductionHouse'])->name('admin.users.production');
    Route::get('Admin/Alladmin', [AdminController::class, 'viewAlladmin'])->name('admin.users.admin');
    Route::get('Admin/Details/{id}', [AdminController::class, 'viewUserDetails'])->name('admin.users.details');
    Route::get('/Admin/Payment', [AdminController::class, 'payment'])->name('admin.payment');
    Route::get('Admin/create', [AdminController::class, 'createUser'])->name('admin.user.create');
    Route::get('Admin/Profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('Admin/user/Delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete')->middleware('logged.user');
    Route::get('Admin/user/Edit/{id}', [AdminController::class, 'editUser'])->name('admin.user.edit');});
    Route::post('Admin/user/Edit', [AdminController::class, 'editUserSubmit'])->name('admin.user.edit.submit');
    Route::post('Admin/create', [AdminController::class, 'createUserSubmit'])->name('admin.user.create.submit');
    Route::get('Admin/content/',[AdminController::class,'viewAllMovies'])->name('MovieList');
    Route::get('Admin/report',[AdminController::class,'viewReport'])->name('report');
    Route::get('Admin/Statistics',[AdminController::class,'Statistics'])->name('Statistics');
    Route::get('Admin/coontent/Delete/{id}',[AdminController::class,'deleteContent'])->name('admin.content.delete');

