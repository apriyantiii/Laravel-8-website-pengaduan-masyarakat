<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\User\UserController;

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

// Route::get('/beranda', function () {
//     return view('beranda', [
//         'tittle' => 'Beranda'
//     ]);
// });

// Route::get('/', function () {
//     return view('daftar');
// });


// Route::get('/beranda-login', function () {
//     return view('beranda2', [
//         'tittle' => 'Beranda Login'
//     ]);
// });

// Route::get('/masuk', [LoginController::class, 'index']);

// Route::get('/daftar', [RegisterController::class, 'index']); //untuk menampilkan
// Route::post('/daftar', [RegisterController::class, 'store'])->name("daftar.submit");//untuk menyimpan


Route::get('/', [UserController::class, 'index'])->name('aduin.index');
Route::post('/register/auth', [UserController::class, 'register'])->name('aduin.register');
Route::get('/register', [UserController::class, 'formRegister'])->name('aduin.formRegister');

Route::post('/login/auth', [UserController::class, 'login'])->name('aduin.login');
Route::get('/masuk', [UserController::class, 'formLogin'])->name('aduin.formLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('aduin.logout');

Route::get('/profile', [UserController::class, 'show'])->name('profile');
Route::post('/store', [UserController::class, 'storePengaduan'])->name('aduin.store');

Route::get('/laporan/{siapa?}', [UserController::class, 'laporan'])->name('aduin.laporan');
Route::get('/pengaduan', [UserController::class, 'formAduan'])->name('aduin.fromAduan');

Route::get('/edit', [UserController::class, 'edit'])->name('aduin.formEdit');
Route::post('/update/{id_pengguna}', [UserController::class, 'update'])->name('update');

Route::get('pengaduan/show', [UserController::class, 'lihatAduan'])->name('aduan.index');
Route::get('pengaduan/show/{kode_pengaduan}', [UserController::class, 'chat'])->name('pengaduan.chat');

Route::post('pengaduan/balas', [UserController::class, 'balasChat'])->name('balas.chat');

Route::prefix('admin')->group(function(){

    Route::get('/',[AdminController::class, 'formLogin'])->name('admin.formLogin');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Route::resource('pengaduan', PengaduanController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('pengguna', PenggunaController::class);



    Route::get('pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('pengaduan/show/{kode_pengaduan}', [PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::post('pengaduan/submit-tanggapan', [PengaduanController::class, 'submitTanggapan'])->name('pengaduan.submit-tanggapan');


    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('getLaporan', [LaporanController::class, 'getLaporan'])->name('laporan.getLaporan');
    Route::get('laporan/cetak/{from}/{to}',[LaporanController::class, 'cetakLaporan'])->name('laporan.cetakLaporan');  
    
    Route::post('tanggapan/createOrUpdate', [TanggapanController::class, 'createOrUpdate'])->name('tanggapan.createOrUpdate');
});
