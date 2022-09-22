<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Latihan;
use App\Models\Dashboard;
use App\Models\Praktikan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(){
        $judul = "Dashboard Praktikan";
        $praktikan = Praktikan::count();
        $latihan = Latihan::count();
       
        return view('praktikan.dashboard_praktikan',compact('praktikan','latihan','judul'));
    }

    private function getLatihanFinish($total,$now){
        $totalLatihanSelesai=0;
        foreach($total as $row){
            if($row->id_latihan < $now){
                $totalLatihanSelesai++;
            }
        }
        return $totalLatihanSelesai;
    }

    private function percentage($part,$all){
        $temp = $part / $all *100;
        return number_format($temp, 0);
    }
}