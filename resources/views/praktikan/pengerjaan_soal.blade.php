@extends('layouts.main4')

@section('konten')

    <div class="container-fluid" style="padding: 0px 70px 0px 70px">
            <div class="row justify-content-center g-5">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <form action="" class="w-100 h-102 mt-5">
                        <textarea class="rounded-10 px-4 py-4 text-textarea w-100 shadow-sm" name="jawaban"
                            style="font-family: consolas; height: 605px; background: #3F3948;">#include<iostream>
using namespace std;
                                                
int main() {  
    
    
    return 0; 
}
                        </textarea>
                        <input type="hidden" class="form-control" id="input" name="input">
                        <input type="hidden" class="form-control" id="hasil" name="hasil">
                        <input type="hidden" class="form-control" value="{{ $latihan->id_latihan }}" name="id_latihan">
                        <input type="hidden" class="form-control" name="id_praktikan"
                            value="{{ Auth::guard('praktikan')->user()->id_praktikan }}">
                        <div class="row justify-content-lg-end justify-content-end">
                            <button id="tombol"
                                class="btn m-3 text-dark fw-bold rounded-5 fs-6 w-25 shadow-sm" style="background: #F6EBCF">Running ></button>
                            <button id="jawab"
                                class="btn m-3 text-white fw-bold rounded-5 fs-6 w-25 shadow-sm" style="background: #3F3948">Jawab</button>
                        </div>

                    </form>
                </div>

                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="card w-100 rounded-10 shadow-sm mh-375 h-375 mt-5" style="background: #F6EBCF">
                        
                        <div class="card-body mh-100 overflow-auto">
                            <p class="fw-bold fs-5">Soal</p>
                            <p class="card-text">{!! $latihan->soal !!}</p>
                        </div>
                    </div>
                    <div class="card w-100 mt-5 rounded-10 shadow-sm mh-200 h-200" style="background: #F6EBCF">
                        <div class="card-body mh-100 overflow-auto">
                            <p class="fw-bold fs-5">Hasil</p>
                            <p class="card-text" id="hasil-show"></p>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {

            $("#tombol").click(function() {

                $("#hasil-show").html("Loading ......");

            });

        });

    </script>
    <script>
        //wait for page load to initialize script
        $(document).ready(function() {
            //listen for form submission
            $('form').on('submit', function(e) {
                //prevent form from submitting and leaving page
                e.preventDefault();

                // AJAX 
                $.ajax({
                    method: 'get', //type of submit
                    cache: false, //important or else you might get wrong data returned to you
                    url: "{{ route('CekJawaban', ['_token' => csrf_token()]) }}", //destination
                    datatype: "html", //expected data format from process.php
                    data: $('form').serialize(), //target your form's data and serialize for a POST
                    success: function(result) { // data is the var which holds the output of your process.php
                        // locate the div with #result and fill it with returned data from process.php 
                        console.log(result);
                        $('#hasil').val(result.hasil);
                        $('#hasil-show').html(result.hasilshow);
                        
                    }
                });
            });
        });

    </script>

    <script>
        $('#jawab').on('click', function() {

            $.ajax({
                method: 'get',
                cache: false,
                url: "{{ route('ValidasiJawaban', ['_token' => csrf_token()]) }}",
                datatype: "html",
                data: $('form').serialize(),

                success: function(result) {
                    console.log(result);

                    if (result.penanda == 1) {
                        iziToast.success({
                            title: 'Jawaban Benar',
                            message: 'dan Sesuai Ketentuan',
                        });
                        $.ajax({
                            method: 'get',
                            cache: false,
                            url: "{{ route('ChangeMateri') }}",
                            datatype: "html",
                            data: {
                                'idPraktikum': result.idPraktikum,
                                'idLatihan': result.idLatihan,
                                'idPraktikan': result.idPraktikan,
                            },
                            success: function(result) {
                                console.log(result);
                                if (result == 0) {
                                    iziToast.success({
                                        title: 'Selamat Anda',
                                        message: 'Telah Menyelesaikan Praktikum',
                                    });
                                } else {
                                    window.location.href = "/materi-praktikum/" +
                                        result.idLatihan+"/"+result.idMateri;
                                }
                            }
                        });

                    } else if (result.penanda == 2) {
                        iziToast.error({
                            title: 'Jawaban Benar,',
                            message: 'Tidak Sesuai Ketentuan',
                            position: 'topRight'
                        });
                    } else {
                        iziToast.error({
                            title: 'Jawaban Salah,',
                            message: 'Silahkan Coba Lagi',
                            position: 'topRight'
                        });
                    }

                }
            });
        });

    </script>

@endsection
