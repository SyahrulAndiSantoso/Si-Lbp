<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Latihan;
use App\Models\Materi;
use App\Models\Praktikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // public function index()
    // {
    //     $praktikan = Praktikan::count();
    //     $materi = Materi::count();
    //     $latihan = Latihan::count();
    //     return view('admin.dashboard_admin', compact('praktikan', 'materi', 'latihan'));
    // }

    public function index()
    {
        $judul = 'Login Admin';

        return view('admin.login_admin', compact('judul'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prosesLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $login = Admin::where(['username' => $username])->first();

        if ($login == null) {
            return redirect('/admin/login-admin')->with('gagal', 'gagal');
        } else if ($login->username == $username and Hash::check($password, $login->password)) {
            $request->session()->regenerate();
            Session::put('sukses', 'berhasil');
            return redirect()->intended('/admin/dashboard');
        }
    }

    public function logout()
    {
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Session::flush();
        return redirect('/admin/login-admin');
    }
}
