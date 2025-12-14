<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/pelatihan', [HomeController::class, 'pelatihan'])->name('pelatihan');
Route::get('/pelatihan/{id}', [HomeController::class, 'pelatihanDetail'])->name('pelatihan.detail');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| User Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('user.profile');
    Route::put('/profile', [UserDashboardController::class, 'updateProfile'])->name('user.profile.update');
    Route::put('/password', [UserDashboardController::class, 'updatePassword'])->name('user.password.update');
    Route::get('/kelas-saya', [UserDashboardController::class, 'kelasSaya'])->name('user.kelas');
    Route::post('/pelatihan/{id}/daftar', [UserDashboardController::class, 'daftarPelatihan'])->name('pelatihan.daftar');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Pelatihan Management
    Route::get('/pelatihan', [AdminController::class, 'pelatihan'])->name('admin.pelatihan');
    Route::get('/pelatihan/create', [AdminController::class, 'pelatihanCreate'])->name('admin.pelatihan.create');
    Route::post('/pelatihan', [AdminController::class, 'pelatihanStore'])->name('admin.pelatihan.store');
    Route::get('/pelatihan/{id}/edit', [AdminController::class, 'pelatihanEdit'])->name('admin.pelatihan.edit');
    Route::put('/pelatihan/{id}', [AdminController::class, 'pelatihanUpdate'])->name('admin.pelatihan.update');
    Route::delete('/pelatihan/{id}', [AdminController::class, 'pelatihanDestroy'])->name('admin.pelatihan.destroy');
    
    // Pendaftaran Management
    Route::get('/pendaftaran', [AdminController::class, 'pendaftaran'])->name('admin.pendaftaran');
    Route::put('/pendaftaran/{id}', [AdminController::class, 'pendaftaranUpdate'])->name('admin.pendaftaran.update');
});
