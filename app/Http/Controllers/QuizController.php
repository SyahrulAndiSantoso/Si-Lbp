<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Latihan;
use App\Models\Praktikan;
use App\Models\AccessQuiz;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function praktikum(){
        $judul = 'Praktikum';
        return view('praktikan.praktikum',compact('judul'));
    }

    public function PanduanPraktikum($id_praktikum){
        $judul = 'Panduan Praktikum';
		$JudulPanduan = ($id_praktikum==1) ? "Pemrograman Terstruktur" : "Struktur Data"; // mengecek judul panduan berdasarkan id pada parameter
		$id_praktikan = request()->id_praktikan; 
		$AQ = AccessQuiz::first()->Quiz($id_praktikan,$id_praktikum); // mendapatkan access quiz dengan idpraktikan dan idpraktikum
		$AQ = $AQ[0]; //membuka array dari AQ[0] jadi AQ

        return view('praktikan.panduan-praktikum',compact('judul','JudulPanduan','AQ'));
    }

    public function PenjelasanPraktikum($id){
        $judul = "Penjelasan Praktikum";
        $materi = Materi::find($id);
        return view('praktikan.penjelasan',compact('judul','materi'));
    }

    public function PengerjaanSoal($id){
        $judul = "Pengerjaan Soal";
		$materi_id = Materi::find($id);
        $latihan = Latihan::where(['materi_id' => $materi_id['id_materi']])->first();
		// dd($latihan);
        return view('praktikan.pengerjaan_soal',compact('judul','latihan'));
    }

    public function cekJawaban(Request $request){
		putenv("PATH=".public_path('minGW/bin'));
		
		$CC="g++";
		$out="a.exe";
		$code=$request->jawaban;

		$input=$request->input;
		$filename_code="main.cpp";
		$filename_in="input.txt";
		$filename_error="error.txt";
		$executable="a.exe";
		$command=$CC." -lm ".$filename_code;	
		$command_error=$command." 2>".$filename_error;
		
		$file_code=fopen($filename_code,"w+");
		fwrite($file_code,$code);
		fclose($file_code);
		$file_in=fopen($filename_in,"w+");
		fwrite($file_in,$input);
		fclose($file_in);
		exec("cacls  $executable /g everyone:f"); 
		exec("cacls  $filename_error /g everyone:f");	

		shell_exec($command_error);
		$error=file_get_contents($filename_error);

		if(trim($error)=="")
		{
			if(trim($input)=="")
			{
				$output=shell_exec($out); //jika tidak ada inputan
			}
			else
			{
				$out=$out." < ".$filename_in; //ada inputan
				$output=shell_exec($out);
			}
			echo "<pre>$output</pre>";
		
		}
		else if(!strpos($error,"error"))
		{
			echo "<pre>$error</pre>";
			if(trim($input)=="")
			{
				$output=shell_exec($out);
			}
			else
			{
				$out=$out." < ".$filename_in;
				$output=shell_exec($out);
			}
			echo "$output";			
		}
		else
		{
			echo "<pre>$error</pre>";
		}
		exec("del $filename_code");
		exec("del *.o");
		exec("del *.txt");
		exec("del $executable");
    }

	public function ValidasiJawaban(Request $request){
		// return $request->all();
		if($request->hasil){
			$latihan = Latihan::find($request->id_latihan);		
			$idPraktikum = AccessQuiz::first()->getIdPraktikumFromMateri($latihan->materi_id);
			
			$kisi_kisi = explode(',',$latihan->kisi_kisi);	//memecah kisi-kisi

				if($kisi_kisi[1]){									// kisi-kisi lebih dari 1
					for ( $i = 0; $i < count( $kisi_kisi ); $i++ ) {
						$CekKisiKisi = strpos($request->jawaban,$kisi_kisi[$i]);  //mengecek jawaban sesuai kisi-kisi, menggunakan cari string (strpos)
					}
				}else{ 												//kisi-kisi cuma 1
						$CekKisiKisi = strpos($request->jawaban,$kisi_kisi[0]);  //mengecek jawaban sesuai kisi-kisi, menggunakan cari string (strpos)
					}

			$jawaban = strpos($request->hasil,$latihan->jawaban); // mengecek jawaban sesuia hasil, menggunakan cari string (strpos)
			$penanda=0;	

				if($jawaban){
					for ( $i = 0; $i < count( $kisi_kisi ); $i++ ) {
						if($CekKisiKisi){
							$penanda = 1;
						}else{
							$penanda = 0;
						}
					}
					// keterangan kode pengembalian nilai : 
					// 1 = jawaban benar dan sesuai ketentuan, 2 = jawaban benar, tidak sesuai ketentuan , 3 = jawaban salah
					$penanda = ($penanda==1)? 1 : 2;
				
				}else{
					$penanda = 3;
				}

			return $result = [
				'penanda'     => $penanda,
				'idLatihan'   => $latihan->id_latihan,
				'idPraktikum' => $idPraktikum,
				'idPraktikan' => request()->id_praktikan,
			];
		}
	}

	public function ChangeMateri(Request $request){
		// dd($request->all());
		$idLatihan = AccessQuiz::first()->getIdLatihanFromAccessQuiz($request->idPraktikum, $request->idLatihan, $request->idPraktikan);
		$idLatihan = $idLatihan[0]->id_latihan; //idLatihan saat ini
		$allLatihan = AccessQuiz::first()->getAllLatihan($request->idPraktikum); //semua id latihan pada praktikum tertentu
		
		foreach($allLatihan as $row){
			if($idLatihan == end($allLatihan[count($allLatihan)-1])){
				return 0;
			}else{
				if($row->id_latihan == $idLatihan){
					$idLatihan = $idLatihan+1;
					AccessQuiz::first()->updateLatihanOnUser($request->idPraktikum, $request->idPraktikan, $idLatihan);
					return $idLatihan;
				}
			}
			
		}
	}
}
