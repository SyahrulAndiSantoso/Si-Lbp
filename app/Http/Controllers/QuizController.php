<?php

namespace App\Http\Controllers;

use App\Models\Latihan;
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

	public function Latihan($id)
	{
		$judul = "Latihan Praktikum";
		$latihan = Latihan::where('praktikum_id', $id)->get();
		return view('praktikan.latihan', compact('judul', 'latihan'));
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
		$hasilshow = str_replace("\n", "<br>", $hasil->output); //mengganti enter dengan <br>
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

	// simpan otomatis jika waktu selesai
	public function autoSave(Request $request)
	{
		$data = [
			"praktikan_id" =>  Auth::guard('praktikan')->user()->id_praktikan,
			"latihan_id" => $request->idLatihan,
			"jawaban" => $request->jawaban,
			"hasil" => $request->hasil,
		];

		Jawaban::create($data);
	}
}
