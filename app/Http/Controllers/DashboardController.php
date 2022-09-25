<?php

namespace App\Http\Controllers;

use App\Models\Latihan;
use App\Models\Dashboard;
use App\Models\Praktikan;
use App\Models\Praktikum;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{

    public function dashboardAdmin()
    {
        $praktikan = Praktikan::count();
        $praktikum = Praktikum::count();
        $latihan = Latihan::count();
        $judul = 'Dashboard';
        return view('admin.dashboard_admin', compact('praktikan', 'praktikum', 'latihan', 'judul'));
    }
    public function index()
    {
        $judul = "Dashboard Praktikan";
        $praktikan = Praktikan::count();
        $latihan = Latihan::count();

        return view('praktikan.dashboard_praktikan', compact('praktikan', 'latihan', 'judul'));
    }

    private function getLatihanFinish($total, $now)
    {
        $totalLatihanSelesai = 0;
        foreach ($total as $row) {
            if ($row->id_latihan < $now) {
                $totalLatihanSelesai++;
            }
        }
        return $totalLatihanSelesai;
    }

    private function percentage($part, $all)
    {
        $temp = $part / $all * 100;
        return number_format($temp, 0);
    }
}
