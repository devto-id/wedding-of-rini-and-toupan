<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InviteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [InviteController::class, 'cover'])->name('invite.cover');
Route::get('/home', [InviteController::class, 'index'])->name('invite.home');
Route::get('/{name}', [InviteController::class, 'coverSlug'])->name('invite.coverSlug');
Route::post('/feedback', [InviteController::class, 'storeFeedback'])->name('invite.feedback.store');
Route::get('/feedback/success', [InviteController::class, 'feedback_success'])->name('invite.feedback.success');

Route::prefix('/admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index']); //alias for /admin/dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


        Route::name('admin.')->group(function () {
            Route::resource('profileBride', \App\Http\Controllers\Admin\ProfileBrideController::class);
            Route::resource('parent', \App\Http\Controllers\Admin\ParentOfBrideController::class);
            Route::resource('visitor', \App\Http\Controllers\Admin\VisitorController::class);
        });
    });

require __DIR__.'/auth.php';
});