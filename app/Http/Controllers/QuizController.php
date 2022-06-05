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
	public function praktikum()
	{
		$judul = 'Praktikum';
		return view('praktikan.praktikum', compact('judul'));
	}

	public function PanduanPraktikum($id_praktikum)
	{
		$judul = 'Panduan Praktikum';
		$JudulPanduan = ($id_praktikum == 1) ? "Pemrograman Terstruktur" : "Struktur Data"; // mengecek judul panduan berdasarkan id pada parameter
		$id_praktikan = request()->id_praktikan;
		$AQ = AccessQuiz::first()->Quiz($id_praktikan, $id_praktikum); // mendapatkan access quiz dengan idpraktikan dan idpraktikum
		$AQ = $AQ[0]; //membuka array dari AQ[0] jadi AQ

		return view('praktikan.panduan-praktikum', compact('judul', 'JudulPanduan', 'AQ'));
	}

	public function MateriPraktikum($id)
	{
		$judul = "Materi Praktikum";
		$materi = Materi::find($id);
		return view('praktikan.materi', compact('judul', 'materi'));
	}

	public function PengerjaanSoal($id)
	{
		$judul = "Pengerjaan Soal";
		$materi_id = Materi::find($id);
		$latihan = Latihan::where(['materi_id' => $materi_id['id_materi']])->first();
		// dd($latihan);
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
		echo $hasil->output;
	}

	public function cekJawaban(Request $request)
	{

		$newLine = str_replace(array("\r", "\n"), "\\n", $request->jawaban); //mengganti enter dgn \n
		$slash   = str_replace("\"", '\\"', $newLine); // mencari " dan mengganti dengan \\"
		$code    = '"' . $slash . '"'; //menambahkan petik di awal dan akhir
		$this->compiler($code);
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
		$allLatihan = AccessQuiz::first()->getAllLatihan($request->idPraktikum); //semua id latihan pada praktikum tertentu

		foreach ($allLatihan as $row) {
			if ($idLatihan == end($allLatihan[count($allLatihan) - 1])) {
				return 0;
			} else {
				if ($row->id_latihan == $idLatihan) {
					$idLatihan = $idLatihan + 1;
					AccessQuiz::first()->updateLatihanOnUser($request->idPraktikum, $request->idPraktikan, $idLatihan);
					return $idLatihan;
				}
			}
		}
	}
}
