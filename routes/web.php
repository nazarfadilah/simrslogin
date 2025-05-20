<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\PasienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Route untuk memproses data login dari form
Route::post('/login', [AuthController::class, 'login']);

// Route untuk logout (biasanya menggunakan POST untuk keamanan)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk halaman setelah login (TANPA middleware 'auth')
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
