@extends('layouts.main2')

@section('konten')
    
<div class="container-fluid">
    <div class="container pt-5 mb-12">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="mt-5 d-flex mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-journal-text w-20" viewBox="0 0 16 16">
                        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                    </svg>
                    <p class="fs-5 ms-2 my-auto">Daftar Pelajaran</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-12 mt-3">
                    <div class="w-100 h-100 bg-white rounded-10 shadow-sm mt-2">
                        <div class="container d-flex justify-content-center">
                            <img class="w-51 m-3" src="{{ asset('assets/img/logo1.png') }}">
                        </div>
                        <p class="fw-bold text-center mb-4">PEMROGRAMAN TERSTRUKTUR</p>
                        <p class="px-4 fs-12 mb-5" style="font-size: 12px;">Pada Praktikum Pemrograman Terstruktur membahas tentang tipe data, operator, pengkondisian, looping array, operasi string, dan function</p>

                        <div class="d-flex justify-content-center">
                            <a class="btn bg-button text-white rounded m-3 w-25 shadow-sm" href="/panduan-pelajaran">pilih</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mt-3">
                    <div class="w-100 h-100 bg-white rounded-10 shadow-sm mt-2">
                        <div class="container d-flex justify-content-center">
                            <img class="w-51 m-3" src="{{ asset('assets/img/logo1.png') }}">
                        </div>
                        <p class="fw-bold text-center mb-4">STRUKTUR DATA</p>
                        <p class="px-4 fs-12 mb-5" style="font-size: 12px;">Pada Praktikum Struktur Data, membahas tentang struct, stack, queue, search, sorting, pointer, dan linked list</p>

                        <div class="d-flex justify-content-center">
                            <a class="btn bg-button text-white rounded m-3 w-25 shadow-sm" href="/panduan-pelajaran">pilih</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection