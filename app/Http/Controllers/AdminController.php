<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Nilai;
use App\Models\Materi;
use App\Models\Latihan;
use App\Models\Praktikan;
use App\Models\Jawaban;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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

        // $this->validate($request, [
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard')->with('sukses', 'berhasil');
        }

        return redirect()->intended('/admin/login-admin')->with('login gagal', 'gagal');

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



    // jawaban

    public function allJawaban()
    {
        $judul = 'Daftar Jawaban';
        $jawaban = Jawaban::getJawaban();

        return view("admin.jawaban", compact('judul', 'jawaban'));
    }

    public function penilaian($idpraktikan, $idlatihan)
    {
        $judul = 'Penilaian';
        $jawaban = Jawaban::getPenilaian($idpraktikan, $idlatihan);

        return view("admin.penilaian", compact('judul', 'jawaban'));
    }

    public function storeNilai(Request $request)
    {
        $data = [
            'praktikan_id' => $request->praktikan_id,
            'praktikum_id' => $request->praktikum_id,
            'latihan_id' => $request->latihan_id,
            'nilai' => $request->nilai,
        ];
        Nilai::create($data);
        return redirect()->route("listJawaban");
    }

    // list nilai
    public function listNilai()
    {
        $judul = 'List Nilai';
        $nilai = Nilai::getNilai();
        return view("admin.list-nilai", compact('judul', 'nilai'));
    }

    public function hapusNilai($id)
    {
        Nilai::find($id)->delete();
        return redirect()->route('listNilai');
    }

    public function editNilaiView($id)
    {
        $judul = 'Edit Nilai';
        $nilai = Nilai::getNilaiSpecific($id);
        // dd($nilai); 
        return view("admin.nilai-view", compact('judul', 'nilai'));
    }

    public function editNilai(Request $request)
    {
        $nilai = Nilai::FindOrFail($request->id_nilai);

        $data = [
            'praktikan_id' => $request->praktikan_id,
            'praktikum_id' => $request->praktikum_id,
            'latihan_id' => $request->latihan_id,
            'nilai' => $request->nilai,
        ];
        $nilai->update($data);
        return redirect()->route('listNilai');
    }
}
