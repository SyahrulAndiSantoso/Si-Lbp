<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Latihan;
use App\Models\Praktikan;
use App\Models\AccessQuiz;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Jawaban;

class QuizController extends Controller
{
	public function praktikum()
	{
		$judul = 'Praktikum';
		return view('praktikan.praktikum', compact('judul'));
	}

	public function PanduanPraktikum(Request $request)
	{
		$judul = 'Panduan Praktikum';
		$id = $request->praktikumId;
		return view('praktikan.panduan-praktikum', compact('judul','id') );
	}

	public function daftarMateri($id){
		$judul = 'Daftar Materi';
		$materi = AccessQuiz::getAllMateri($id);
		$latihan = Latihan::all();
		$idPraktikan = Auth::guard('praktikan')->user()->id_praktikan;
		$quiz = AccessQuiz::where(['praktikan_id' =>$idPraktikan, 'praktikum_id' => $id])->first();

		return view('praktikan.daftar-materi', compact('judul','materi','latihan','quiz'));
	}

	public function MateriPraktikum($idLatihan,$idMateri)
	{
		$judul = "Materi Praktikum";
		$materi = Materi::find($idMateri);
		$latihan = Latihan::where(['id_latihan' =>$idLatihan, 'materi_id' => $idMateri])->first();

		return view('praktikan.materi', compact('judul', 'materi','latihan'));
	}

	public function PengerjaanSoal($id)
	{
		$judul = "Pengerjaan Soal";
		$latihan = Latihan::where(['id_latihan' => $id])->first();
		return view('praktikan.pengerjaan_soal', compact('judul', 'latihan'));
	}

	public function compiler($code)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.jdoodle.com/v1/execute',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => '{
		  "clientId" : "2fc9c1272f68adca264ff71446d48358",
		  "clientSecret" : "173d47d487158220c3183e0ac789817729179b17ceb69092059ecf3552b5272a",
		  "script" : ' . $code . ',
		  "language" : "cpp",
		  "versionIndex" : "5"
		}
		',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		$hasil = json_decode($response, false);
		$hasilshow = str_replace("\n","<br>",$hasil->output); //mengganti enter dengan <br>
		return $result = [
			'hasil' => $hasil->output,
			'hasilshow' => $hasilshow
		];
	}

	public function cekJawaban(Request $request)
	{

		$newLine = str_replace(array("\r", "\n"), "\\n", $request->jawaban); //mengganti enter dgn \n
		$slash   = str_replace("\"", '\\"', $newLine); // mencari " dan mengganti dengan \\"
		$code    = '"' . $slash . '"'; //menambahkan petik di awal dan akhir
		$result = $this->compiler($code);
		return $result;
		
	}

	public function ValidasiJawaban(Request $request)
	{
		// return $request->all();
		if ($request->hasil) {
			$latihan = Latihan::find($request->id_latihan);
			$idPraktikum = AccessQuiz::first()->getIdPraktikumFromMateri($latihan->materi_id);

			$kisi_kisi = explode(',', $latihan->kisi_kisi);	//memecah kisi-kisi

			if ($kisi_kisi[1]) {									// kisi-kisi lebih dari 1
				for ($i = 0; $i < count($kisi_kisi); $i++) {
					$CekKisiKisi = strpos($request->jawaban, $kisi_kisi[$i]);  //mengecek jawaban sesuai kisi-kisi, menggunakan cari string (strpos)
				}
			} else { 												//kisi-kisi cuma 1
				$CekKisiKisi = strpos($request->jawaban, $kisi_kisi[0]);  //mengecek jawaban sesuai kisi-kisi, menggunakan cari string (strpos)
			}


			$jawaban = ($request->hasil == $latihan->jawaban) ? 1 : 0; // mengecek jawaban sesuia hasil, menggunakan cari string (strpos)

			$penanda = 0;

			if ($jawaban) {
				for ($i = 0; $i < count($kisi_kisi); $i++) {
					if ($CekKisiKisi) {
						$penanda = 1;
					} else {
						$penanda = 0;
					}
				}
				// keterangan kode pengembalian nilai : 
				// 1 = jawaban benar dan sesuai ketentuan, 2 = jawaban benar, tidak sesuai ketentuan , 3 = jawaban salah
				$penanda = ($penanda == 1) ? 1 : 2;
			} else {
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

	public function ChangeMateri(Request $request)
	{
		// dd($request->all());
		$idLatihan = AccessQuiz::first()->getIdLatihanFromAccessQuiz($request->idPraktikum, $request->idLatihan, $request->idPraktikan);
		$idLatihan = $idLatihan[0]->id_latihan; //idLatihan saat ini
		$allLatihan = AccessQuiz::first()->getAllLatihan($request->idPraktikum); //semua id latihan pada praktikum tertentu cuma buat perulangan
	
		foreach ($allLatihan as $row) {
			if ($idLatihan == end($allLatihan[count($allLatihan) - 1])) {
				return 0;
			} else {
				if ($row->id_latihan == $idLatihan) {
					$idLatihan = $idLatihan + 1;
					$idMateri = AccessQuiz::getIdMateriFromLatihan($idLatihan);
					$idMateri = $idMateri[0]->materi_id; //hanya membuka array
					
					AccessQuiz::first()->updateLatihanOnUser($request->idPraktikum, $request->idPraktikan, $idMateri ,$idLatihan);
					return $result = [
						'idMateri' => $idMateri,
						'idLatihan' => $idLatihan
					];
				}
			}
		}
	}

	// simpan otomatis jika waktu selesai
	public function autoSave(Request $request){
		$data = [
			"praktikan_id" =>  Auth::guard('praktikan')->user()->id_praktikan ,
			"latihan_id" => $request->idLatihan,
			"jawaban" => $request->jawaban,
			"hasil" => $request->hasil,
		];
		// return $request->all();
		Jawaban::create($data);
       
	}
}