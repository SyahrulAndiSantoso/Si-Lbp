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

    public function index(){
        $data = Materi::all();
        $data_praktikum = Praktikum::all();
        $judul = "Materi";
        return view('admin.materi', compact('data','judul','data_praktikum'));
    }

    public function store(Request $request){
        Materi::create($request->all());
        return back();
    }

    public function viewEdit($id){
        $judul = "Edit Materi";
        $data = Materi::find($id);
        $data_praktikum = Praktikum::all();
        return view('admin.edit.edit-materi', compact('data','judul','data_praktikum'));
    }

    public function update(Request $request){
        $id_materi = $request->id_materi;
        $materi = Materi::FindOrFail($id_materi);
        $materi->update($request->all());
          return redirect()->route('viewMateri');
    }

    public function delete($id){
        $data = Materi::find($id);
        $data->delete();
        return redirect()->route('viewMateri');
    }
}
