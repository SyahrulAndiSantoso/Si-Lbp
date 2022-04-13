<?php

use App\Http\Controllers\CKeditorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
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
})->middleware('guest');

// Route::get('/admin/login-admin', function () {
//     return view('admin.login_admin', [
//         'judul' => 'Login'
//     ]);
// });
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


Route::middleware(['auth:admin'])->group(function () {
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard_admin', [
        "judul" => "Dashboard Admin"
    ]);
});

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
Route::get('/praktikum', [QuizController::class, 'praktikum']);
Route::get('/panduan-praktikum', [QuizController::class, 'PanduanPraktikum']);
Route::get('/penjelasan-praktikum/{id}', [QuizController::class, 'PenjelasanPraktikum']);
Route::get('/pengerjaan-soal/{id}', [QuizController::class, 'PengerjaanSoal']);
Route::get('/cek-jawaban', [QuizController::class, 'cekJawaban']);

// ---------------- Praktikum ---------------------
Route::get('/admin/praktikum', [PraktikumController::class, 'index'])->name("viewPraktikum");
Route::post('/admin/praktikum/store', [PraktikumController::class, 'store']);
Route::post('/admin/praktikum/update', [PraktikumController::class, 'update']);
Route::delete('/admin/praktikum/delete/{number}', [PraktikumController::class, 'destroy']);
Route::get('/admin/edit-praktikum/{id}', [PraktikumController::class, 'edit']);

});

// ---------------- DASHBOARD ---------------
Route::get('/admin/login-admin', [AdminController::class, 'index'])->name("login")->middleware('guest');
// Route::get('/admin/login', [AdminController::class, 'index'])->name('login.admin');
Route::post('/admin/login', [AdminController::class, 'prosesLogin']);
Route::post('/admin/logout', [AdminController::class, 'logout']);

// ---------------- PRAKTIKAN ---------------
Route::post('/praktikan/login', [PraktikanController::class, 'loginPraktikan'])->name('loginPraktikan');
Route::get('/praktikan/logout', [PraktikanController::class, 'logout']);
Route::post('/praktikan/register', [PraktikanController::class, 'register']);

// --------- CKEditor ------------------------
// route upload image
Route::post('CKeditor/upload', [CKeditorController::class, 'upload'])->name('Ckeditor.upload');
