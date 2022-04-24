@extends('layouts.main2')

@section('konten')

<div class="container-fluid">
    <div class="container pt-5 mb-12">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <form action="" class="w-100 h-102 mt-5">
                    <label class="fw-bold fs-5" for="">Code Editor</label>
                    <textarea class="bg-button rounded-10 text-white w-100 h-52 shadow-sm" name="jawaban" style="font-family: consolas;">#include<iostream>
using namespace std;
    
main() {  
    
}
</textarea>
                    <input type="hidden" class="form-control" id="input" name="input">
                    <input type="hidden" class="form-control" id="hasil" name="hasil">
                    <input type="hidden" class="form-control" value="{{$latihan->id_latihan}}" name="id_latihan">
                    <input type="hidden" class="form-control" name="id_praktikan" value="{{ Auth::guard('praktikan')->user()->id_praktikan }}">
                    <div class="row justify-content-lg-end justify-content-end">
                        <button   id="tombol"  class="btn bg-warning m-3 text-white rounded-5 fs-6 w-25 shadow-sm">Run</button>
                        <button  id="jawab" class="btn bg-button m-3 text-white rounded-5 fs-6 w-25 shadow-sm">Jawab</button>
                    </div>
                    
                </form>
            </div>

            <div class="col-lg-5 col-md-12 col-sm-12">
                <label class="fw-bold fs-5 mt-5">Soal</label>
                <div class="card w-100 rounded-10 shadow-sm mh-300 h-300">

                    <div class="card-body mh-100 overflow-auto">
                        <p class="card-text">{!! $latihan->soal !!}</p>
                    </div>
                </div>
                <label class="mt-5 fw-bold fs-5" for="">Hasil</label>
                <div class="card w-100 rounded-10 shadow-sm mh-300 h-300" >
                    <div class="card-body mh-100 overflow-auto">
                        <p class="card-text" id="hasil-show"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
  
    $(document).ready(function(){
  
       $("#tombol").click(function(){
    
             $("#hasil-show").html("Loading ......");
  
       });
  
    });
  
  </script>
  <script>
    //wait for page load to initialize script
    $(document).ready(function(){
        //listen for form submission
        $('form').on('submit', function(e){
          //prevent form from submitting and leaving page
          e.preventDefault();
    
          // AJAX 
          $.ajax({
                method: 'get', //type of submit
                cache: false, //important or else you might get wrong data returned to you
                url: "{{route('CekJawaban', ['_token' => csrf_token()])}}", //destination
                datatype: "html", //expected data format from process.php
                data: $('form').serialize(), //target your form's data and serialize for a POST
                success: function(result) { // data is the var which holds the output of your process.php
    
                    // locate the div with #result and fill it with returned data from process.php
                    $('#hasil').val(result);
                    $('#hasil-show').html(result);
                }       
            });
        });
    });
    </script>

    <script>
        $('#jawab').on('click',function(){
          
            $.ajax({
                method: 'get', 
                cache: false,
                url: "{{route('ValidasiJawaban', ['_token' => csrf_token()])}}", 
                datatype: "html", 
                data: $('form').serialize(),
                        
                success: function(result) { 
                  console.log(result);
                    
                    if(result.penanda == 1){
                        alert("jawaban benar dan sesuai ketentuan");
                        
                        $.ajax({
                            method: 'get', 
                            cache: false, 
                            url: "{{route('ChangeMateri')}}", 
                            datatype: "html", 
                            data:{
                                'idPraktikum' : result.idPraktikum,
                                'idLatihan'   : result.idLatihan,
                                'idPraktikan' : result.idPraktikan,
                            },   
                            success: function(result) {
                              
                                if(result == 0){
                                    alert('Selamat anda telah menyelesaikan Praktikum');
                                }else{
                                    window.location.href = "/penjelasan-praktikum/" + result;
                                }
                                }
                            });

                    }else if(result.penanda == 2){
                        alert("jawaban benar, tidak sesuai ketentuan");
                    }else{
                        alert("jawaban salah"); 
                    }
                   
                }       
            });
        });
    </script>
    

@endsection