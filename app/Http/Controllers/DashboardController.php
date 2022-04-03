<?php

namespace App\Http\Controllers;

use App\Models\Latihan;
use App\Models\Materi;
use App\Models\Praktikan;

class DashboardController extends Controller
{
    public function index(){
        $judul = "Dashboard Admin";
        $praktikan = Praktikan::count();
        $materi = Materi::count();
        $latihan = Latihan::count();

        return view('admin.dashboard_admin',compact('praktikan','materi','latihan','judul'));
    }
}
