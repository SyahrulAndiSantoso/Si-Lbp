<?php

namespace App\Http\Controllers;

use App\Models\Praktikan;
use Database\Seeders\praktikan as SeedersPraktikan;
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
        $praktikan = Praktikan::all()->sortBy('created_at');
        $judul = "Praktikan";
        return view('admin.praktikan',compact('praktikan','judul'));
    }

    public function store(Request $request)
    {
        Praktikan::create($request->all());
        return redirect()->route('viewPraktikan');
    }

    public function viewEdit($id)
    {
        $judul = 'Edit Praktikan';
        $data = Praktikan::find($id);
        return view('admin.edit.edit-praktikan',compact('data','judul'));
    }

    public function update(Request $request)
    {
        $data = Praktikan::find($request->id_praktikan);
        $data->update($request->all());
        return redirect()->route('viewPraktikan');
    }

    public function delete($id)
    {
        $data = Praktikan::find($id);
        $data->delete();
        return redirect()->route('viewPraktikan');
    }
}
