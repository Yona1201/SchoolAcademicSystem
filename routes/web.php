<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminGuruController;
use App\Http\Controllers\Guru\GuruDashboardController;
use App\Http\Controllers\Guru\GuruKelasController;
use App\Http\Controllers\Guru\GuruParentController;
use App\Http\Controllers\Guru\GuruPertemuanController;
use App\Http\Controllers\Guru\GuruSiswaController;
use App\Http\Controllers\Parent\ParentAbsensiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\SiswaAbsensiController;
use App\Http\Controllers\Siswa\SiswaDashboardController;
use App\Http\Controllers\Siswa\SiswaKelasController;
use App\Http\Controllers\Siswa\SiswaKelasSayaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return redirect(route('login'));
});


Route::prefix('admin')->name('admin.')->middleware('role:0')->group(
    function () {
        Route::resource('dashboard', AdminDashboardController::class);
        Route::resource('guru', AdminGuruController::class);
    }
);


// prefix guru
Route::prefix('guru')->name('guru.')->middleware('role:1')->group(function () {
    Route::resource('dashboard', GuruDashboardController::class);
    Route::resource('siswa', GuruSiswaController::class);
    Route::resource('parent', GuruParentController::class);
    Route::prefix('kelas')->name('kelas.')->group(function () {
        Route::resource('data-kelas', GuruKelasController::class);
        Route::resource('pertemuan', GuruPertemuanController::class);
    });
});
// prefix parent
Route::prefix('parent')->name('parent.')->group(function () {
    Route::resource('absensi', ParentAbsensiController::class);
    Route::get('autentikasi', [ParentAbsensiController::class, 'autentikasi'])->name('autentikasi');
    Route::post('autentikasi', [ParentAbsensiController::class, 'autentikasiProses'])->name('autentikasi');
});
// prefix siswa
Route::prefix('siswa')->name('siswa.')->middleware('role:3')->group(function () {
    Route::resource('dashboard', SiswaDashboardController::class);
    Route::resource('kelas', SiswaKelasController::class);
    Route::resource('kelas-saya', SiswaKelasSayaController::class);
    Route::resource('absensi', SiswaAbsensiController::class);
});




use Illuminate\Support\Facades\Artisan;

Route::get('/clearAll', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:Cclear');
    Artisan::call('view:clear');

    return "Cache, config, route, dan view berhasil dihapus!";
});

require __DIR__ . '/auth.php';
