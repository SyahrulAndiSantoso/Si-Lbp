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
        latihan::create($request->all());
        return back();
    }

    public function delete($id)
    {
        latihan::find($id)->delete();
        return redirect()->route('viewLatihan');
    }

    public function viewEdit($id)
    {
        $judul = "Latihan";
        $data = latihan::find($id);
        $data_praktikum = Praktikum::all();
        $data_materi = materi::all();
        return view('admin.edit.edit-latihan', compact('data', 'judul', 'data_praktikum', 'data_materi'));
    }

    public function update(Request $request){
        $id_latihan = $request->id_latihan;
        $latihan = latihan::FindOrFail($id_latihan);
        $latihan->update($request->all());
          return redirect()->route('viewLatihan');
    }
}
