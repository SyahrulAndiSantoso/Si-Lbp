<?php

namespace App\Http\Controllers;

use App\Models\Praktikan;
use Database\Seeders\praktikan as SeedersPraktikan;
use Illuminate\Http\Request;

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
        $validatedData = $request->validate([
            "npm" => "required|min:13|max:30",
            "nama_praktikan" => "required|min:3",
            "notelp" => "required|min:12",
            "email" => "required|email:dns",
            "password" => "required|min:7"
        ]);
        Praktikan::create($validatedData);
        return back()->with('sukses tambah', 'Menambahkan');
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
        $validatedData = $request->validate([
            "npm" => "required|min:13|max:30",
            "nama_praktikan" => "required|min:3",
            "notelp" => "required|min:12",
            "email" => "required|email:dns",
            "password" => "required|min:7"
        ]);
        $data->update($validatedData);
        return redirect()->route('viewPraktikan')->with('sukses update', 'Mengupdate');
    }

    public function delete($id)
    {
        $data = Praktikan::find($id);
        $data->delete();
        return redirect()->route('viewPraktikan')->with('sukses hapus', 'Menghapus');
    }
}
