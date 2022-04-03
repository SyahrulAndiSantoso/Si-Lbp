<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PraktikanController;
use App\Http\Controllers\PraktikumController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LatihanController;

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
Route::get('/peringkat', function () {
    return view('praktikan.peringkat', [
        'judul' => 'Peringkat'
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



Route::get('/admin/praktikum', [PraktikumController::class, 'index']);
Route::post('/admin/praktikum/create', [PraktikumController::class, 'store']);
Route::delete('/admin/praktikum/delete/{number}', [PraktikumController::class, 'destroy']);
// Route::get('/admin/pelajaran', function () {
//     return view('admin.pelajaran', [
//         'judul' => 'Pelajaran'
//     ]);
// });



// EDIT DATA
Route::get('/admin/edit-latihan', function () {
    return view('admin.edit.edit-latihan', [
        "judul" => "Edit Latihan"
    ]);
});

Route::get('/admin/edit-praktikum', function () {
    return view('admin.edit.edit-praktikum', [
        "judul" => "Edit praktikum"
    ]);
});


// ---------------- DASHBOARD ---------------
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name("home");

// ---------------- PRAKTIKAN ---------------
Route::get('/admin/praktikan', [PraktikanController::class, 'index'])->name("viewPraktikan");
Route::post('/praktikan/store', [PraktikanController::class, 'store']);
Route::post('/praktikan/update', [PraktikanController::class, 'update']);
Route::get('/praktikan/delete/{id}', [PraktikanController::class, 'delete']);
Route::get('/praktikan/view-edit/{id}', [PraktikanController::class, 'viewEdit']);


// ----------------  MATERI ------------------
Route::get('/admin/materi', [MateriController::class, 'index'])->name('viewMateri');
Route::post('/materi/store', [MateriController::class, 'store']);
Route::post('/materi/update', [MateriController::class, 'update']);
Route::get('/materi/delete/{id}', [MateriController::class, "delete"]);
Route::get('/materi/view-edit/{id}', [MateriController::class, "viewEdit"]);

//  ----------------  LATIHAN ------------------
Route::get('/admin/latihan', [LatihanController::class, 'index'])->name('viewLatihan');
Route::post('/latihan/store', [LatihanController::class, 'store']);
Route::get('/latihan/delete/{id}', [LatihanController::class, 'delete']);
Route::get('/latihan/view-edit/{id}', [LatihanController::class, 'viewEdit']);
Route::post('/latihan/update', [LatihanController::class, 'update']);

// ---------------- Quiz ---------------------
Route::get('/praktikum',[QuizController::class,'praktikum']);
Route::get('/panduan-praktikum',[QuizController::class,'PanduanPraktikum']);
Route::get('/penjelasan-praktikum',[QuizController::class,'PenjelasanPraktikum']);
Route::get('/pengerjaan-soal',[QuizController::class,'PengerjaanSoal']);







