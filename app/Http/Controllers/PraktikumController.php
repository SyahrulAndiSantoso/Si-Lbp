<?php

namespace App\Http\Controllers;

use App\Models\Praktikum;
use Illuminate\Http\Request;

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
        return view('admin.pelajaran', [
            'judul' => 'pelajaran',
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
        return view('admin.pelajaran');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->PraktikumModel->nama_praktikum = $request->pelajaran1;
        $this->PraktikumModel->deskripsi = strip_tags($request->deskripsi1);

        $this->PraktikumModel->save();
        return redirect('/admin/pelajaran');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->PraktikumModel->destroy($id);
        return redirect('/admin/pelajaran');
    }
}
