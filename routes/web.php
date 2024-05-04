<?php

// use Illuminate\Routing\Route;

use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPdf\Facades\Pdf;

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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'render'])->name('dashboard');
    Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'render'])->name('user');

    Route::post('/import/siswa', [App\Http\Controllers\Admin\DashboardController::class, 'import'])->name('import.siswa');
    Route::post('/import/user', [App\Http\Controllers\Admin\UserController::class, 'import'])->name('import.user');


    Route::get('/setting', [App\Http\Controllers\Admin\SettingController::class, 'render'])->name('setting');
    Route::post('/setting-action', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('update.setting');

    //? USER
    Route::get('/user/{id}/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update.user');
    Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create.user');
    Route::get('/user/{id}/delete', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('delete.user');

    Route::post('/user-action/create', [App\Http\Controllers\Admin\UserController::class, 'action_create'])->name('action.create.user');
    Route::put('/user-action/{id}/update', [App\Http\Controllers\Admin\UserController::class, 'action_update'])->name('action.update.user');

    //? SISWA
    Route::get('/siswa/{id}/update', [App\Http\Controllers\Admin\DashboardController::class, 'update'])->name('update.siswa');
    Route::get('/siswa/create', [App\Http\Controllers\Admin\DashboardController::class, 'create'])->name('create.siswa');
    Route::get('/siswa/{id}/delete', [App\Http\Controllers\Admin\DashboardController::class, 'delete'])->name('delete.siswa');

    Route::post('/siswa-action/create', [App\Http\Controllers\Admin\DashboardController::class, 'action_create'])->name('action.create.siswa');
    Route::put('/siswa-action/{id}/update', [App\Http\Controllers\Admin\DashboardController::class, 'action_update'])->name('action.update.siswa');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'render'])->name('home');

    Route::get('/surat/pengumuman-kelulusan', [App\Http\Controllers\ExportSuratController::class, 'pengumuman_kelulusan'])->name('export.pengumuman_kelulusan');
    Route::get('/surat/keterangan-lulus', [App\Http\Controllers\ExportSuratController::class, 'keterangan_lulus'])->name('export.keterangan_lulus');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [App\Http\Controllers\LoginController::class, 'render'])->name('login');
    Route::post('/signin', [App\Http\Controllers\LoginController::class, 'signin'])->name('signin');
});
