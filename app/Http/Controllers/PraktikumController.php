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
        $validatedData = $request->validate([
            "nama_praktikum" => "required|min:5",
            "deskripsi" => "required",
            "gambar" => "required|image"
        ]);

        // dd($request);

        $validatedData['deskripsi'] = strip_tags($request->deskripsi);
        $validatedData['gambar'] = $request->file('gambar')->store('image-storage');

        Praktikum::create($validatedData);
        return redirect('/admin/praktikum')->with('sukses tambah', 'Menambahkan');
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
        return redirect()->route('viewPraktikum')->with('sukses hapus', 'Menghapus');
    }
}
