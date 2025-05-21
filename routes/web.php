<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PoliController;
use Illuminate\Http\Request;
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
Route::get('/dashboard', [
    DashboardController::class,
    'index'
])->name('dashboard');


Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
Route::get('/riwayat_pendaftaran', [PendaftaranController::class, 'riwayat'])->name('riwayat_pendaftaran');
Route::get('/tambah_pendaftaran', [PendaftaranController::class, 'create'])->name('tambah_pendaftaran');

// Pasien
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien');
Route::get('/tambah_pasien', [PasienController::class, 'tambah'])->name('tambah_pasien');
Route::get('/edit_pasien', [PasienController::class, 'edit'])->name('edit_pasien');



// Poli
Route::get('/poli', [PoliController::class, 'index'])->name('poli');

// Dokter
Route::get('/dokter', [DokterController::class, 'index'])->name('dokter');