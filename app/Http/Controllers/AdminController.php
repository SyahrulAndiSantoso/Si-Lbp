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
        $this->validate($request, [
        'username' => 'required',
        'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard')->with('sukses','berhasil');
        }

        return redirect()->intended('/admin/login-admin')->with('login gagal','gagal');
        
        // $username = $request->input('username');
        // $password = $request->input('password');

        // $login = Admin::where(['username' => $username])->first();

        // if ($login == null) {
        //     return redirect('/admin/login-admin')->with('gagal', 'gagal');
        // } else if ($login->username == $username and Hash::check($password, $login->password)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/admin/dashboard')->with('sukses', 'berhasil');
        // }
    }

    public function logout()
    {
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Session::flush();
        return redirect('/admin/login-admin');
    }
}
