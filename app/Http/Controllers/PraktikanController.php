<?php

namespace App\Http\Controllers;

use App\Models\Praktikan;
use App\Models\AccessQuiz;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class PraktikanController extends Controller
{
    protected $PraktikanModel;
    public function __construct()
    {
        $this->PraktikanModel = new Praktikan();
    }

    public function index()
    {
        $praktikan = Praktikan::all()->sortBy('created_at');
        $judul = "Praktikan";
        return view('admin.praktikan', compact('praktikan', 'judul'));
    }

    public function store(Request $request)
    {
        Praktikan::create($request->all());
        return redirect()->route('viewPraktikan');
    }

    public function viewEdit($id)
    {
        $judul = 'Edit Praktikan';
        $data = Praktikan::find($id);
        return view('admin.edit.edit-praktikan', compact('data', 'judul'));
    }

    public function update(Request $request)
    {
        $data = Praktikan::find($request->id_praktikan);
        $data->update($request->all());
        return redirect()->route('viewPraktikan');
    }

    public function delete($id)
    {
        $data = Praktikan::find($id);
        $data->delete();
        return redirect()->route('viewPraktikan');
    }

    public function register(Request $request)
    {

        Praktikan::create([
            'npm' => $request->npm,
            'nama_praktikan' => $request->nama_praktikan,
            'password' => bcrypt($request->password),
            'notelp' => $request->notelp,
            'email' => $request->email,
        ]);
        
        // setting default praktikum praktikan ketika awal register
        $id_praktikan = Praktikan::where(['npm' => $request->npm])->first()->id_praktikan;
        AccessQuiz::create([
           'praktikan_id' => $id_praktikan,
           'praktikum_id' => 1,
           'materi_id'    => 1,
         ]);
          // setting default praktikum praktikan ketika awal register
        $awalmateri = Materi::where(['praktikum_id'=>2])->first()->id_materi;
        AccessQuiz::create([
           'praktikan_id' => $id_praktikan,
           'praktikum_id' => 2,
           'materi_id'    => $awalmateri,
         ]);

        return redirect('/masuk');
    }

    public function loginPraktikan(Request $request)
    {
        $npm = $request->input('npm');
        $password = $request->input('password');

        $praktikan = Praktikan::where(['npm' => $npm])->first();

        if ($praktikan == null) {
            return redirect('/masuk')->with('failed', 'login gagal');
        } else if ($praktikan->npm == $npm and Hash::check($password, $praktikan->password)) {
            $request->session()->regenerate();
            Session::put('id', $praktikan->id_praktikan);
            Session::put('npm', $npm);
            return redirect()->intended('/dashboard');
        }
    }

    public function logout()
    {
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Session::flush();
        return redirect('/masuk');
    }
}
