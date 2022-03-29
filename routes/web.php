<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\PraktikanController;
use App\Http\Controllers\PraktikumController;

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

Route::get('/', function () {
    return view('praktikan.landing_page', [
        'judul' => 'Home'
    ]);
});
Route::get('/panduan', function () {
    return view('praktikan.panduan', [
        'judul' => 'Panduan'
    ]);
});
Route::get('/panduan-pelajaran', function () {
    return view('praktikan.panduan_pelajaran', [
        'judul' => 'Panduan Pelajaran'
    ]);
});
Route::get('/peringkat', function () {
    return view('praktikan.peringkat', [
        'judul' => 'Peringkat'
    ]);
});
Route::get('/pelajaran', function () {
    return view('praktikan.pelajaran', [
        'judul' => 'Pelajaran'
    ]);
});

Route::get('/masuk', function () {
    return view('praktikan.login_praktikan', [
        'judul' => 'Login'
    ]);
});
Route::get('/admin/login-admin', function () {
    return view('admin.login_admin', [
        'judul' => 'Login'
    ]);
});
Route::get('/daftar', function () {
    return view('praktikan.registrasi', [
        "judul" => "Registrasi"
    ]);
});
Route::get('/dashboard', function () {
    return view('praktikan.dashboard_praktikan', [
        "judul" => "Dashboard"
    ]);
});
Route::get('/pengaturan', function () {
    return view('praktikan.pengaturan', [
        "judul" => "Pengaturan Akun"
    ]);
});
Route::get('/pengerjaan-soal', function () {
    return view('praktikan.pengerjaan_soal', [
        "judul" => "Pengerjaan Soal"
    ]);
});
Route::get('/penjelasan', function () {
    return view('praktikan.penjelasan', [
        "judul" => "Penjelasan"
    ]);
});
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard_admin', [
        "judul" => "Dashboard"
    ]);
});
Route::get('/admin/latihan', function () {
    return view('admin.latihan', [
        "judul" => "Latihan"
    ]);
});

Route::get('/admin/praktikan', [PraktikanController::class, 'index']);
Route::post('/admin/praktikan/create', [PraktikanController::class, 'store']);
Route::delete('/admin/pratikan/delete/{number}', [PraktikanController::class, 'destroy']);
Route::put('/admin/praktikan/edit/{number}', [PraktikanController::class, 'update']);
// Route::get('/admin/praktikan', function () {
//     return view('admin.praktikan', [
//         "judul" => "Praktikan"
//     ]);
// });

Route::get('/admin/pelajaran', [PraktikumController::class, 'index']);
Route::post('/admin/pelajaran/create', [PraktikumController::class, 'store']);
Route::delete('/admin/pelajaran/delete/{number}', [PraktikumController::class, 'destroy']);
// Route::get('/admin/pelajaran', function () {
//     return view('admin.pelajaran', [
//         'judul' => 'Pelajaran'
//     ]);
// });


// ----------------  MATERI ------------------
Route::get('/admin/materi', [MateriController::class, 'index'])->name('viewMateri');
Route::post('/materi/store', [MateriController::class, 'store']);
Route::post('/materi/update', [MateriController::class, 'update']);
Route::get('/materi/delete/{id}', [MateriController::class, "delete"]);

// EDIT DATA
Route::get('/admin/edit-latihan', function () {
    return view('admin.edit.edit-latihan', [
        "judul" => "Edit Latihan"
    ]);
});

Route::get('/admin/edit-materi', function () {
    return view('admin.edit.edit-materi', [
        "judul" => "Edit Materi"
    ]);
});

Route::get('/admin/edit-praktikan', function () {
    return view('admin.edit.edit-praktikan', [
        "judul" => "Edit Praktikan"
    ]);
});

Route::get('/admin/edit-pelajaran', function () {
    return view('admin.edit.edit-pelajaran', [
        "judul" => "Edit Pelajaran"
    ]);
});
