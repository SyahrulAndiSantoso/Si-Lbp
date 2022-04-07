@extends('layouts.main2')

@section('konten')

<div class="container-fluid">
    <div class="container pt-5 mb-12">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <form action="/cek-jawaban" class="w-100 h-102 mt-5">
                    <label class="fw-bold fs-5" for="">Code Editor</label>
                    <textarea class="bg-button rounded-10 text-white w-100 h-52 shadow-sm" name="jawaban" style="font-family: consolas;">#include<iostream>
using namespace std;
    
main() {  
    
}
</textarea>
                    <input type="hidden" class="form-control" id="input" name="input">
                    <div class="row justify-content-lg-end justify-content-end">
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#modalLevel" class="btn bg-button m-3 text-white rounded-5 fs-6 w-25 shadow-sm">Jawab</button>
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
                <div class="card w-100 rounded-10 shadow-sm mh-300 h-300">
                    <div class="card-body mh-100 overflow-auto">
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
{{-- <div class="modal fade" id="modalLevel" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1"> --}}
    {{-- <div class="modal-dialog modal-dialog-centered"> --}}
        {{-- <div class="modal-content rounded"> --}}
            {{-- <div class="modal-header"> --}}
                {{-- <!-- <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5> --> --}}
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            {{-- </div> --}}
            {{-- <div class="modal-body"> --}}
                {{-- <p class="fs-3 fw-bold text-center">Selamat Jawaban Anda Benar !!!</p> --}}
                {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check2 rounded mx-auto d-block w-50" viewBox="0 0 16 16"> --}}
                    {{-- <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" /> --}}
                {{-- </svg> --}}
{{--  --}}
                {{-- <div class="d-flex mb-2"> --}}
                    {{-- {{-- <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;" fill="currentColor" class="bi bi-chevron-double-up rounded float-start w-15" viewBox="0 0 16 16"> --}} --}}
                        {{-- <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 3.707 2.354 9.354a.5.5 0 1 1-.708-.708l6-6z" /> --}}
                        {{-- <path fill-rule="evenodd" d="M7.646 6.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 7.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" /> --}}
                    {{-- </svg> --}}
                    {{-- <h6 class="my-auto ms-2">Pemrograman Terstruktur Level</h6> --}}
                {{-- </div> --}}
{{--  --}}
{{--  --}}
{{--  --}}
                {{-- <div class="progress w-100 rounded-pill"> --}}
                    {{-- {{-- <div class="progress-bar bg-warning rounded-pill" role="progressbar" style="width: 10%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div> --}} --}}
                {{-- </div> --}}
                {{-- <br><br><br> --}}
                {{-- <a class="btn btn-primary mt-5 rounded-5 position-absolute bottom-0 end-0 m-3" href="#">Lanjutkan</a> --}}
            {{-- </div> --}}
        {{-- </div> --}}
    {{-- </div> --}}
{{-- </div> --}}

@endsection