<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use App\Models\Materi;
use App\Models\Latihan;
use App\Models\Praktikan;
use App\Models\AccessQuiz;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Database\Seeders\praktikan as SeedersPraktikan;
use Illuminate\Support\Facades\Mail;

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
        return view('admin.praktikan', compact('praktikan', 'judul'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "npm" => "required|min:13|max:30",
            "nama_praktikan" => "required|min:3",
            "notelp" => "required|min:10|max:13",
            "email" => "required|email:dns",
            "password" => "required|min:8"
        ]);
        Praktikan::create($validatedData);
        return back()->with('sukses tambah', 'Menambahkan');
    }

    public function viewEdit($id)
    {
        $judul = 'Edit Praktikan';
        $data = Praktikan::find($id);
        return view('admin.edit.edit-praktikan', compact('data', 'judul'));
    }

    public function update(Request $request)
    {
        $data = Praktikan::find($request->id_praktikan);
        $validatedData = $request->validate([
            "npm" => "required|min:13|max:30",
            "nama_praktikan" => "required|min:3",
            "notelp" => "required|min:10|max:13",
            "email" => "required|email:dns",
            "password" => "required|min:8"
        ]);
        $data->update($validatedData);
        return redirect()->route('viewPraktikan')->with('sukses update', 'Mengupdate');
    }

    public function delete($id)
    {
        $data = Praktikan::find($id);
        $data->delete();
        return redirect()->route('viewPraktikan')->with('sukses hapus', 'Menghapus');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'npm' => 'required|min:15',
            'nama_praktikan' => 'required|min:5',
            'password' => 'required|min:8',
            'notelp' => 'required|min:10|max:13',
            'email' => 'required|email:dns'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        Praktikan::create($validatedData);

        // setting default praktikum praktikan ketika awal register
        $id_praktikan = Praktikan::where(['npm' => $request->npm])->first()->id_praktikan;
        AccessQuiz::create([
            'praktikan_id' => $id_praktikan,
            'praktikum_id' => 1,
            'materi_id'    => 1,
            'latihan_id'   => 1,
        ]);
        // setting default praktikum praktikan ketika awal register
        $awalmateri = Materi::where(['praktikum_id' => 2])->first()->id_materi;
        $awalLatihan = Praktikan::first()->getFirstIdMateri($awalmateri);
        
        AccessQuiz::create([
            'praktikan_id' => $id_praktikan,
            'praktikum_id' => 2,
            'materi_id'    => $awalmateri,
            'latihan_id'   => $awalLatihan[0]->id_latihan,
        ]);

        return redirect('/masuk')->with('registrasi berhasil', 'registrasi');
    }

    public function loginPraktikan(Request $request)
    {
        $credentials = $request->validate([
            "npm" => "required",
            "password" => "required"
        ]);

        if (Auth::guard('praktikan')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('sukses', 'berhasil');
        }

        return redirect()->intended('/masuk')->with('login gagal', 'gagal');
    }

    public function logout()
    {
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Session::flush();
        return redirect('/masuk')->with('logout', 'logout');
    }

//     public function forgotPassword(){
//         $judul = "Forgot Password";
//         return view('praktikan.forgot-password', compact('judul'));   
//     }

//     public function forgotPasswordStore(Request $request){
//         $judul = "Reset Password";
//         $credentials = $request->validate([
//             "email" => "required|email:dns",
//         ]);

//         $token = base64_encode(random_bytes(32));
//         $this->_sendEmail($token);
    
//     }

//     public function resetPassword(Request $request){

       
//     }

//     private function _sendEmail($token){

//         $details =[
//             'title' => 'mail from LBP',
//             'body' => 'new password',
//         ];
//             Mail::to("emzob8030@gmail.com")->send(new sendMail);
//             return "Email Send";
//             // App::make('url')->to('/')
//     }
}
