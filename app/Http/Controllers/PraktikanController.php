<?php

namespace App\Http\Controllers;

use App\Models\Praktikan;
use Database\Seeders\praktikan as SeedersPraktikan;
use Illuminate\Http\Request;
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

    public function loginPraktikan(Request $request)
    {
        $npm = $request->input('npm');
        $password = $request->input('password');

        $praktikan = Praktikan::where(['npm' => $npm])->first();

        if ($praktikan == null) {
            return redirect('/masuk')->with('failed', 'login gagal');
        } else if ($praktikan->npm == $npm and Hash::check($password, $praktikan->password)) {
            $request->session()->regenerate();
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
