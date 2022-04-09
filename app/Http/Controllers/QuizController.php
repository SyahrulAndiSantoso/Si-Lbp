<?php

namespace App\Http\Controllers;

use App\Models\Latihan;
use App\Models\Materi;
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

    public function PenjelasanPraktikum($id){
        $judul = "Penjelasan Praktikum";
        $materi = Materi::find($id);
        return view('praktikan.penjelasan',compact('judul','materi'));
    }

    public function PengerjaanSoal($id){
        $judul = "Pengerjaan Soal";
        $latihan = Latihan::find($id);
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

	//if(trim($code)=="")
	//die("The code area is empty");
	
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
		// return redirect()->route('viewMateri');
              //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
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
		                //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
	}
	else
	{
		echo "<pre>$error</pre>";
	}
	// dd($output);
	exec("del $filename_code");
	exec("del *.o");
	exec("del *.txt");
	exec("del $executable");

    }
}
