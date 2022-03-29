<?php

namespace App\Http\Controllers;


use App\Models\Materi;
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
        $judul = "Materi";
        return view('admin.materi', compact('data','judul'));
    }

    public function store(Request $request){
        Materi::create($request->all());
        return back();
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
