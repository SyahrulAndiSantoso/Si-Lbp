<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function praktikum(){
        $judul = 'Praktikum';
        return view('praktikan.praktikum',compact('judul'));
    }

    public function PanduanPraktikum(){
        $judul = 'Panduan Praktikum';
        return view('praktikan.panduan-praktikum',compact('judul'));
    }

    public function PenjelasanPraktikum(){
        $judul = "Penjelasan Praktikum";
        return view('praktikan.penjelasan',compact('judul'));
    }

    public function PengerjaanSoal(){
        $judul = "Pengerjaan Soal";
        return view('praktikan.pengerjaan_soal',compact('judul'));
    }
}
