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

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('praktikan.landing_page', [
            'judul' => 'Home'
        ]);
    });

    Route::get('/masuk', function () {
        return view('praktikan.login_praktikan', [
            'judul' => 'Login'
        ]);
    });
    
    Route::get('/daftar', function () {
        return view('praktikan.registrasi', [
            "judul" => "Registrasi"
        ]);
    });
    
    
    

    // Route::get('/forgot-password', [PraktikanController::class, 'forgotPassword'])->name('forgotPassword');
    // Route::post('/forgot-password-store', [PraktikanController::class, 'forgotPasswordStore']);
    // Route::get('/reset-password', [PraktikanController::class, 'resetPassword'])->name('resetPassword');
    
});

Route::get('/panduan', function () {
    return view('praktikan.panduan', [
        'judul' => 'Panduan Penggunaan Aplikasi'
    ]);
});

Route::middleware(['auth:praktikan'])->group(function () {
   
    
    Route::get('/daftar-materi', function () {
        return view('praktikan.daftar-materi', [
            'judul' => 'Daftar Materi'
        ]);
    });

    Route::get('/pengaturan', function () {
        return view('praktikan.pengaturan', [
            "judul" => "Pengaturan Akun"
        ]);
    });
    
    // ---------------- Quiz ---------------------
    Route::get('/dashboard', [DashboardController::class, 'index'])->name("DashboardPraktikan");
    Route::get('/praktikum', [QuizController::class, 'praktikum']);
    Route::get('/daftar-materi/{id}', [QuizController::class, 'daftarMateri']);
    Route::post('/panduan-praktikum', [QuizController::class, 'PanduanPraktikum']);
    Route::get('/materi-praktikum/{idLatihan}/{idMateri}', [QuizController::class, 'MateriPraktikum']);
    Route::get('/pengerjaan-soal/{id}', [QuizController::class, 'PengerjaanSoal']);
    Route::get('/cek-jawaban', [QuizController::class, 'cekJawaban'])->name('CekJawaban');
    Route::get('validasi-jawaban', [QuizController::class, 'ValidasiJawaban'])->name('ValidasiJawaban');
    Route::get('ChangeMateri', [QuizController::class, 'ChangeMateri'])->name('ChangeMateri');
    Route::post('/autoSave', [QuizController::class, 'autoSave'])->name('autoSave');
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
    
    //------------------- Jawaban --------------------
    Route::get('/admin/jawaban', [AdminController::class, 'allJawaban'])->name("listJawaban");
    Route::get('/admin/penilaian/{idpraktikan}/{idlatihan}', [AdminController::class, 'penilaian']);
    Route::get('/store-nilai', [AdminController::class, 'storeNilai']);
    
    // List Nilai
    Route::get('/admin/listnilai', [AdminController::class, 'listNilai'])->name("listNilai");
    Route::get('/hapus-nilai/{id}', [AdminController::class, 'hapusNilai']);
    Route::get('/edit-nilai-view/{id}', [AdminController::class, 'editNilaiView']);
    Route::post('/edit-nilai', [AdminController::class, 'editNilai']);


    // ---------------- Praktikum ---------------------
    Route::get('/admin/praktikum', [PraktikumController::class, 'index'])->name("viewPraktikum");
    Route::post('/admin/praktikum/store', [PraktikumController::class, 'store']);
    Route::post('/admin/praktikum/update', [PraktikumController::class, 'update']);
    Route::delete('/admin/praktikum/delete/{number}', [PraktikumController::class, 'destroy']);
    // Route::get('/admin/praktikum/delete/{number}', [PraktikumController::class, 'destroy']);
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