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
        $materi = Materi::count();
        $latihan = Latihan::count();

        $totalLatihanPetruk = Dashboard::getAllLatihan(1);  //semua latihan
        $petrukNow = Dashboard::getFinishLatihan(1)->first()->id_latihan;   //latihan saat ini

        $totalLatihanStrukdat = Dashboard::getAllLatihan(2);
        $strukdatNow = Dashboard::getFinishLatihan(2)->first()->id_latihan;

        $allFinishPetruk = $this->getLatihanFinish($totalLatihanPetruk,$petrukNow); //latihan yang selesai
        $allFinishStrukdat = $this->getLatihanFinish($totalLatihanStrukdat,$strukdatNow);

        $nextLatihanPT = Dashboard::getLatihanNow(Auth::guard('praktikan')->user()->id_praktikan,1 )->first();
        $nextLatihanSD = Dashboard::getLatihanNow(Auth::guard('praktikan')->user()->id_praktikan,2 )->first();

        $percentage = [
            'petruk'              => $this->percentage($allFinishPetruk, count($totalLatihanPetruk)),
            'petrukFinish'        => $allFinishPetruk,
            'petrukInProgress'    => count($totalLatihanPetruk) - $allFinishPetruk,
            'strukdat'            => $this->percentage($allFinishStrukdat, count($totalLatihanStrukdat)),
            'strukdatFinish'      => $allFinishStrukdat,
            'strukdatInProgress'  => count($totalLatihanStrukdat) - $allFinishStrukdat,
            'PT'                  => $nextLatihanPT,
            'SD'                  => $nextLatihanSD,
        ];
       
        return view('praktikan.dashboard_praktikan',compact('praktikan','materi','latihan','judul','percentage'));
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
