<?php

namespace App\Http\Controllers;


use App\Models\Praktikum;
use App\Models\latihan;
use App\Models\Materi;
use App\Models\Kisi_Kisi;

use Illuminate\Http\Request;

class LatihanController extends Controller
{

    protected $LatihanModel;

    public function __construct()
    {
        $LatihanModel = new latihan();
    }

    public function index()
    {
        $data = latihan::all();
        $judul = "Latihan";
        $data_materi = Materi::first()->getMateri();
        // dd($data_materi);
        $data_praktikum = praktikum::all();
        return view('admin.latihan', compact('data', 'judul', 'data_materi', 'data_praktikum'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            "nama_latihan" => "required",
            "soal" => "required",
            "jawaban" => "required",
            "praktikum_id" => "required",
            "materi_id" => "required",
            "kisi_kisi" => "required|min:2",
            "time" => "required"
        ]);
        $validatedData['soal'] = strip_tags($request->soal);
        $validatedData['jawaban'] = strip_tags($request->jawaban);

        latihan::create($validatedData);
        return back()->with('sukses tambah', 'Menambahkan');
    }

    public function delete($id)
    {
        latihan::find($id)->delete();
        return redirect()->route('viewLatihan')->with('sukses hapus', 'Menghapus');
    }

    public function viewEdit($id)
    {
        $judul = "Latihan";
        $data = latihan::find($id);
        $data_praktikum = Praktikum::all();
        $data_materi = materi::all();
        return view('admin.edit.edit-latihan', compact('data', 'judul', 'data_praktikum', 'data_materi'));
    }

    public function update(Request $request)
    {
        $id_latihan = $request->id_latihan;
        $latihan = latihan::FindOrFail($id_latihan);
        $validatedData = $request->validate([
            "nama_latihan" => "required",
            "soal" => "required",
            "jawaban" => "required",
            "praktikum_id" => "required",
            "materi_id" => "required",
            "kisi_kisi" => "required|min:2",
            "time" => "required"
        ]);
        $validatedData['soal'] = strip_tags($request->soal);
        $validatedData['jawaban'] = strip_tags($request->jawaban);
        
        $latihan->update($validatedData);
        return redirect()->route('viewLatihan')->with('sukses update', 'Mengupdate');
    }
}