<?php

namespace App\Http\Controllers;

use App\Models\Praktikum;
use Database\Seeders\praktikum as SeedersPraktikum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PraktikumController extends Controller
{

    protected $PraktikumModel;
    public function __construct()
    {
        $this->PraktikumModel = new Praktikum();
    }

    public function index()
    {
        return view('admin.praktikum', [
            'judul' => 'praktikum',
            'praktikum' => Praktikum::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama_praktikum" => "required|min:5",
            "deskripsi" => "required",
            "gambar" => "required|image"
        ]);

        $validatedData['deskripsi'] = strip_tags($request->deskripsi);
        $validatedData['gambar'] = $request->file('gambar')->store('image-storage');

        Praktikum::create($validatedData);
        return redirect('/admin/praktikum')->with('sukses tambah', 'Menambahkan');
    }

    public function edit($id)
    {
        $praktikum = Praktikum::find($id);
        return view('admin.edit.edit-praktikum', [
            'judul' => 'edit-praktikum',
            'praktikum' => $praktikum
        ]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $id_praktikum = $request->id_praktikum;
        $praktikum = Praktikum::FindOrFail($id_praktikum);
        $validatedData = $request->validate([
            "nama_praktikum" => "required|min:5",
            "deskripsi" => "required",
            "gambar" => "required|image"
        ]);
        $validatedData['deskripsi'] = strip_tags($request->deskripsi);
        $validatedData['gambar'] = $request->file('gambar')->store('image-storage');

        if ($request->gambarLama) {
            Storage::delete($request->gambarLama);
        }
        $praktikum->update($validatedData);

        return redirect()->route('viewPraktikum')->with('sukses update', 'Mengupdate');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->gambar) {
            Storage::delete($request->gambar);
        }
        $this->PraktikumModel->find($id)->delete();
        return redirect()->route('viewPraktikum')->with('sukses hapus', 'Menghapus');
    }
}
