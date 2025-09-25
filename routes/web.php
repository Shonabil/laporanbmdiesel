<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ReportSectionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Routes yang hanya bisa diakses setelah login
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('dashboard');

        Route::get('/progress', [ProgressController::class, 'userIndex'])->name('progress.index');
        Route::get('/progress/{id}', [ProgressController::class, 'userProgress'])->name('progress.show');

        Route::get('/profile', function () {
            return view('user.profile');
        })->name('profile');
    });


    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
Route::prefix('admin')->name('admin.')->group(function () {
    // Redirect /admin -> /admin/dashboard
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    

        // Report
        Route::get('/report', [ReportController::class, 'index'])->name('report.index');
        Route::post('/store', [ReportController::class, 'store'])->name('report.store');
        Route::get('/history', [ReportController::class, 'history'])->name('report.history');
        Route::get('/payment', [ReportController::class, 'payment'])->name('report.payment');
        Route::get('/download/{id}', [ReportController::class, 'download'])->name('report.download');
        Route::delete('/{id}', [ReportController::class, 'destroy'])->name('report.destroy');
        Route::get('/after-submit/{id}', [ReportController::class, 'afterSubmit'])->name('report.afterSubmit');
        Route::get('/invoice/{id}', [ReportController::class, 'invoice'])->name('report.invoice');

        Route::post('/reports/{report}/sections', [ReportSectionController::class, 'store'])
            ->name('report.section.store');

        // Payment
        Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
        Route::patch('/payment/update/{id}', [PaymentController::class, 'update'])->name('payment.update');

        // Progress
        Route::get('/progress', [ProgressController::class, 'index'])->name('progress.index');
        Route::post('/progress', [ProgressController::class, 'store'])->name('progress.store');
        Route::delete('/progress/{id}', [ProgressController::class, 'destroy'])->name('progress.destroy');
    });
});
