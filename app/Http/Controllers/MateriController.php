<?php

namespace App\Http\Controllers;


use App\Models\Materi;
use App\Models\Praktikum;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    protected $MateriModel;

    public function __construct()
    {
        $MateriModel = new Materi();
    }

    public function index()
    {
        $data = Materi::all();
        $data_praktikum = Praktikum::all();
        $judul = "Materi";


        return view('admin.materi', compact('data', 'judul', 'data_praktikum'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama_materi" => "required|min:4",
            "praktikum_id" => "required",
            "isi_materi" => "required"
        ]);
        $validatedData['isi_materi'] = strip_tags($request->isi_materi);
        Materi::create($validatedData);
        return back()->with('sukses tambah', 'Menambahkan');
    }

    public function viewEdit($id)
    {
        $judul = "Edit Materi";
        $data = Materi::find($id);
        $data_praktikum = Praktikum::all();
        return view('admin.edit.edit-materi', compact('data', 'judul', 'data_praktikum'));
    }

    public function update(Request $request)
    {
        $id_materi = $request->id_materi;
        $materi = Materi::FindOrFail($id_materi);
        $validatedData = $request->validate([
            "nama_materi" => "required",
            "praktikum_id" => "required",
            "isi_materi" => "required"
        ]);
        $validatedData['isi_materi'] = strip_tags($request->isi_materi);
        $materi->update($validatedData);
        return redirect()->route('viewMateri')->with('sukses update', 'Mengupdate');
    }

    public function delete($id)
    {
        $data = Materi::find($id);
        $data->delete();
        return redirect()->route('viewMateri')->with('sukses hapus', 'Menghapus');
    }
}
