<?php

namespace App\Http\Controllers;

use App\Models\Praktikan;
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
        return view('admin.praktikan', [
            "judul" => "praktikan",
            "praktikan" => $this->PraktikanModel->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.praktikan');
    }

    public function store(Request $request)
    {
        $this->PraktikanModel->nama_praktikan = $request->nama_praktikan;
        $this->PraktikanModel->notelp = $request->nomerHp1;
        $this->PraktikanModel->npm = $request->npm1;
        $this->PraktikanModel->email = $request->email1;

        $this->PraktikanModel->create();
        return redirect('/admin/praktikan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Praktikan::find($id);
        return view('admin.praktikan', [
            "judul" => "praktikan",
            "data" => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Praktikan::find($id);
        // $data->id_praktikan = $request->id_praktikan;
        // $data->nama_praktikan = $request->nama_praktikan;
        // $data->notelp = $request->nomerHp1;
        // $data->npm = $request->npm1;
        // $data->email = $request->email1;

        return dd($data);
    }

    public function destroy($id)
    {
        $this->PraktikanModel->hapus($id);
        return redirect('/admin/praktikan');
        // return dd($id);
    }
}
