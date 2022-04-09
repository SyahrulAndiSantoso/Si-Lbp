<?php

namespace App\Http\Controllers;

use App\Models\Praktikum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PraktikumController extends Controller
{

    protected $PraktikumModel;
    public function __construct()
    {
        $this->PraktikumModel = new Praktikum();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.praktikum', [
            'judul' => 'praktikum',
            'praktikum' => Praktikum::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin/praktikum');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $this->PraktikumModel->nama_praktikum = $request->praktikum;
        $this->PraktikumModel->deskripsi = strip_tags($request->deskripsi);
        $this->PraktikumModel->gambar = $request->file('gambar')->store('image-storage');

        $this->PraktikumModel->save();
        return redirect('/admin/praktikum');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $praktikum = Praktikum::find($id);
        return view('admin.edit.edit-praktikum', [
            'judul' => 'edit-praktikum',
            'praktikum' => $praktikum
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $id_praktikum = $request->id_praktikum;
        $praktikum = $this->PraktikumModel->FindOrFail($id_praktikum);
        $praktikum->update([
            'id_praktikum' => $id_praktikum,
            'nama_praktikum' => $request->nama_praktikum,
            'deskripsi' => strip_tags($request->deskripsi),
            'gambar' => $request->file('gambar')->store('image-storage'),
        ]);

        if ($request->gambarLama) {
            Storage::delete($request->gambarLama);
        }

        return redirect()->route('viewPraktikum');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->gambar) {
            Storage::delete($request->gambar);
        }
        $this->PraktikumModel->find($id)->delete();
        return redirect()->route('viewPraktikum');
    }
}
